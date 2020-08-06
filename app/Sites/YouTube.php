<?php

namespace App\Sites;

use Illuminate\Database\Eloquent\Model;

class YouTube extends Model
{
    private $video_id;
    private $video_title;
    private $video_url;
    private $pattern;

    public function __construct()
    {
        $this->pattern = "/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/";
    }

    /*
     * Set the url
     * @param string
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /*
     * Check if the url is valid
     * return bool
     */
    public function isValid()
    {
        if (preg_match($this->pattern, $this->url)) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * Validate the given video url
     * return bool
     */
    public function hasVideo()
    {
        $valid = true;
        parse_str($this->getVideoInfo(), $data);
        return $data;
        if ($data["status"] == "fail") {
            $valid = false;
        }
        return $valid;
    }

    /////////////////////////////////////////////////

    /*
     * Get the video information
     * return string
     */
    private function getVideoInfo()
    {
        return file_get_contents("https://www.youtube.com/get_video_info?video_id=" . $this->extractVideoId($this->url) . "&cpn=CouQulsSRICzWn5E&eurl&el=adunit");
    }

    /*
     * Get video Id
     * @param string
     * return string
     */
    private function extractVideoId($video_url)
    {
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $video_url, $id);
        $this->video_id = $id[1];
        return $this->video_id;
    }

    /*
     * Get the downloader object if pattern matches else return false
     * @param string
     * return object or bool
     *
     */
    public function getDownloader($url)
    {
        /*
         * check the pattern match with the given video url
         */
        if (preg_match($this->link_pattern, $url)) {
            return $this;
        }
        return false;
    }

    /*
     * Get the video download link
     * return array
     */
    public function getVideoData()
    {
        //parse the string separated by '&' to array
        parse_str($this->getVideoInfo(), $data);
        $videoData = json_decode($data['player_response'], true);
        $videoDetails = $videoData['videoDetails'];
        $streamingData = $videoData['streamingData'];
        $streamingDataFormats = $streamingData['formats'];

        //set video title
        $this->video_title = $videoDetails["title"];

        //Get the youtube root link that contains video information
        $final_stream_map_arr = array();

        //Create array containing the detail of video
        foreach ($streamingDataFormats as $stream) {
            $stream_data = $stream;
            $stream_data["title"] = $this->video_title;
            $stream_data["mime"] = $stream_data["mimeType"];
            $mime_type = explode(";", $stream_data["mime"]);
            $stream_data["mime"] = $mime_type[0];
            $start = stripos($mime_type[0], "/");
            $format = ltrim(substr($mime_type[0], $start), "/");
            $stream_data["format"] = $format;
            unset($stream_data["mimeType"]);
            $final_stream_map_arr[] = $stream_data;
            $final_stream_map_arr['video_id'] = $this->video_id;
        }
        return $final_stream_map_arr;
    }

    /*
     * Get the video thumbnail
     */
    public function getThumbnail()
    {
        $resolution = array(
            'maxresdefault',
            'sddefault',
            'mqdefault',
            'hqdefault',
            'default',
        );

        for ($x = 0; $x < sizeof($resolution); $x++) {
            $url = 'https://img.youtube.com/vi/' . $this->video_id . '/' . $resolution[$x] . '.jpg';
            if (get_headers($url)[0] == 'HTTP/1.0 200 OK') {
                break;
            }
        }
        return $url;
    }
}
