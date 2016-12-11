<?php

$autoloader = require 'vendor/autoload.php';
$autoloader->add('', __DIR__ . 'generated-classes/');
require 'generated-conf/config.php';


class EventsAPIHandler {
    
    function GetEvent($sport) {
        $dates array(date("Y-m-d"), date("Y-m-d", strtotime("+1 day")), date("Y-m-d", strtotime("+2 day")));
        $response = array();

        $events = EventQuery::create()
            ->filterByDate(array('min' => dates[0], dates[count -1]))
            ->filterBySport($sport)
            ->with('Options')
            ->find();

        $options = OptionQuery::create()

        foreach($dates as $date) {
            $games = array();
            foreach ($events as $event) {
                if ($event->getDate === $date) {
                        $game = array(
                            "eventID" => $event->getEventID(),
                            "title" => $event->getTitle(),
                            "options" => array(),
                        ); 
                        $teams = array();
                        foreach($event->getOptionss() as $option) {
                            array_push($teams, 
                                       array(
                                           "optionID" => $option->getOptionID(),
                                           "text" => $option->getText(),
                                           "image" => $option->getImage(),
                                           "voteCount" => $option->getVoteCount()
                                            )
                                      )
                    }
                    array_push($game['options'],$teams)
                }
                array_push($games, $game);
            }    
            $response[$date] = $games; 
        }
    }
}