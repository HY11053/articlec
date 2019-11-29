<?php
/**
 * Created by PhpStorm.
 * User: liang
 * Date: 2017/3/8
 * Time: 13:34
 */

namespace App;


class Notification
{
    public  function Notificate(){
        $notifications=array();
        foreach (User::first()->unreadNotifications as $notification) {
            if (class_basename($notification->type)!='ArticlePublishedNofication'){
                $notifications[]=$notification->data[0];
            }

        }
        return $notifications;
    }
    public function ArticleNotificate(){
        $articlenotifications=array();
        foreach (auth('web')->user()->unreadNotifications as $notification) {
            if (class_basename($notification->type)=='ArticlePublishedNofication'){
                $articlenotifications[]=$notification->data;
            }

        }
        return $articlenotifications;
    }
    function Allnotifications (){
        $allnotifications=array();
        foreach (auth('web')->user()->unreadNotifications as $notification) {

                $allnotifications[]=$notification;
            

        }
       return $allnotifications;
    }
}