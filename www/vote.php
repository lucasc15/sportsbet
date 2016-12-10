<?php
require_once(__DIR__.'/../vendor/autoload.php');
require_once(__DIR__.'/../generated-conf/config.php');


class VoteRegister {

  function Vote($user_id, $option_id, $event_id, $ip_address) {
    $event = EventsQuery::create()
      ->findPk($event_id);
    $options = $event->getOptionss();
    $option_ids = array();
    foreach($options as $option){
      array_push($option_ids, $option->getOptionID());
    }
    if ($user_id !== null) {
      // If a user is specified find a vote by user id for a given event
      $vote = VotesQuery::create()
	->useOptionsQuery()
	  ->filterByOptionID($option_ids)
	->endUse()
	->useUsersQuery()
	  ->filterByUserID($user_id)
	->endUse()
	->find();
    } else {
      // If user is ananymous, see if anyone has voted from the same IP address
      $vote = VotesQuery::create()
	->useOptionsQuery()
	  ->filterByOptionID($option_ids)
	->endUse()
	->filterByIpAddress($ip_address)
	->find();
    }
    $out = fopen(__DIR__.'/query_result.html', 'w');
    fwrite($out, count($vote));
    if (count($vote) < 1) {
      // In the case they have votes create a new vote for the event/option combination
      $vote = new Votes();
      $vote->setOptionID($option_id);
      $vote->setUserID($user_id);
      $vote->setIPAddress($ip_address);
      $vote->save();
      $this->increaseVoteCount($option_id);
    } else {
      // case to change their Vote
      fwrite($out, "got here!!");
      if ($vote[0]->getOptionID() != $option_id) {
	$this->decreaseVoteCount($vote[0]->getOptionID());
	$option = OptionsQuery::create()->findPk($option_id);
	$vote[0]->setOptions($option);
	$vote[0]->save();
	$this->increaseVoteCount($option_id);
      } else {
	fclose($out);
	// If they are creating a duplicate vote have angular notify the voter;
	return "You already cast this vote!";
      }
    }
    fclose($out);
    return "";
  }

  private function increaseVoteCount($option_id) {
    $option = OptionsQuery::create()
      ->findPk($option_id);
    $option->setVoteCount($option->getVoteCount() + 1);
    $option->save();
  }
  private function decreaseVoteCount($option_id) {
    $option = OptionsQuery::create()
      ->findPk($option_id);
    $option->setVoteCount($option->getVoteCount() - 1);
    $option->save();
  }
}