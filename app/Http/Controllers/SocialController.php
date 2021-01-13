<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_FacebookID(Request $request)
    {
        $profile_url = $request->get('facebook');
        function get_web_page( $url )
           {
               $user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';
               $options = array(
                   CURLOPT_CUSTOMREQUEST  =>"GET",        //set request type post or get
                   CURLOPT_POST           =>false,        //set to GET
                   CURLOPT_USERAGENT      => $user_agent, //set user agent
                   CURLOPT_COOKIEFILE     =>"cookie.txt", //set cookie file
                   CURLOPT_COOKIEJAR      =>"cookie.txt", //set cookie jar
                   CURLOPT_RETURNTRANSFER => true,     // return web page
                   CURLOPT_HEADER         => false,    // don't return headers
                   CURLOPT_FOLLOWLOCATION => true,     // follow redirects
                   CURLOPT_ENCODING       => "",       // handle all encodings
                   CURLOPT_AUTOREFERER    => true,     // set referer on redirect
                   CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
                   CURLOPT_TIMEOUT        => 120,      // timeout on response
                   CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
               );
               $ch      = curl_init( $url );
               curl_setopt_array( $ch, $options );
               $content = curl_exec( $ch );
               $err     = curl_errno( $ch );
               $errmsg  = curl_error( $ch );
               $header  = curl_getinfo( $ch );
               curl_close( $ch );
               $header['errno']   = $err;
               $header['errmsg']  = $errmsg;
               $header['content'] = $content;
               return $header;
           }

       /*Getting user id */
       $url = 'http://findmyfbid.com';
       $data = array('url' => $profile_url );
       // use key 'http' even if you send the request to https://...
       $options = array(
           'http' => array(
               'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
               'method'  => 'POST',
               'content' => http_build_query($data),
           ),
       );
       $context  = stream_context_create($options);
       $result = file_get_contents($url, false, $context);
       function getData($data)
       {
           $dom = new \DOMDocument;
           $dom -> loadHTML( $data );
           $divs = $dom -> getElementsByTagName('code');
           foreach ( $divs as $div )
           {
                   return $div -> nodeValue;

           }
       }
       $uid = getData($result);  // User ID
       dd($uid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
