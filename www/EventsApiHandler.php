<?php
/*$autoloader->add('', __DIR__ . 'generated-classes/');*/
require_once(__DIR__.'/../vendor/autoload.php');
require_once(__DIR__.'/../generated-conf/config.php');



class EventsAPIHandler {

    function GetEvents($sport) {
        $dates = array(date("Y-m-d"), date("Y-m-d", strtotime("+1 day")), date("Y-m-d", strtotime("+2 day")));
        $response = array();
        $sport = SportsQuery::create()
            ->filterBySport($sport)
            ->find();
        $events = EventsQuery::create()
            ->filterByDate(array('min' => $dates[0], 'max' => $dates[count($dates) - 1]))
            ->filterBySportID($sport[0]->getSportID())
            ->join('Events.Options')
            ->with('Options')
            ->find();

        //$options = OptionQuery::create();
        foreach($dates as $date) {
            $games = array();
            foreach ($events as $event) {
                if ($event->getDate()->format('Y-m-d') == $date) {
                    $game = array(
                        "eventID" => $event->getEventID(),
                        "title" => $event->getTitle(),
                        "options" => array(),
                    ); 
                    foreach($event->getOptionss() as $option) {
                        array_push($game['options'], 
                                   array(
                                       "optionID" => $option->getOptionID(),
                                       "text" => $option->getText(),
                                       "image" => $option->getImage(),
                                       "voteCount" => $option->getVoteCount()
                                   )
                                  );
                    }
                    array_push($games, $game);
                }
            }
            $response[$date] = $games; 
        }
        return array("dates" => array($response));
    }
}




