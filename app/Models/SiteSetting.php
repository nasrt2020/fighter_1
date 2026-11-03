<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
 
  protected $fillable = [
  'phone_1','phone_2',
  'email_1','email_2',
  'address_line_1','address_line_2',
  'map_iframe_src',

  'footer_about_text',
  'footer_address','footer_email','footer_website','footer_phone',
  'facebook_url','instagram_url','youtube_url','linkedin_url',
  'footer_copy',
  'footer_logo',

  // topbar
  'top_phone','top_email','show_topbar',
  'top_facebook_url','top_youtube_url','top_instagram_url',
  
  //seo
  'seo_site_title',
'seo_site_description',
'seo_default_og_image',
 'seo_keywords',
];


}
