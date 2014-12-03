<?php

require_once 'includes/includes.php';

class LinkTest extends \Codeception\TestCase\Test {
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before() {
        $this->user = find_user_by_name('ghoster');
        $this->link = find_link_by_id(1);
    }

    protected function _after() {
    }

    public function testAddLinkFromUser() {
        $title = 'Test Link';
        $url   = 'http://example.com/path';
        add_link_from_user($title, $url, $this->user);
        $this->tester->seeInDatabase('links', array('title' => $title,
                                                    'url' => $url,
                                                    'user_id' => $this->user['id']));
    }
    
    public function testFindingLinkById() {
        $this->tester->assertEquals($this->link['title'], 'Test Title');
    }
    
    public function testUpVotingOfLink() {
        upvote_link_by_user($this->link, $this->user);
        $this->tester->seeInDatabase('link_votes', array( 'user_id' => $this->user['id'],
                                                         'link_id' => $this->link['id'],
                                                         'amount' => 1));
    }
    
    public function testMultipleUpVotingOfLinks() {
        upvote_link_by_user($this->link, $this->user);
        upvote_link_by_user($this->link, $this->user);
        $link_vote = find_link_vote_by_link_and_user($this->link, $this->user);
        $this->tester->assertEquals($link_vote['amount'], 1);
    }
    
    public function testDownVotingOfLink() {
        downvote_link_by_user($this->link, $this->user);
        $this->tester->seeInDatabase('link_votes', array( 'user_id' => $this->user['id'],
                                                         'link_id' => $this->link['id'],
                                                         'amount' => -1));
    }
    
    public function testMultipleDownVotingOfLinks() {
        downvote_link_by_user($this->link, $this->user);
        downvote_link_by_user($this->link, $this->user);
        $link_vote = find_link_vote_by_link_and_user($this->link, $this->user);
        $this->tester->assertEquals($link_vote['amount'], -1);
    }
    
    public function testUndoUpVotingOfLink() {
        upvote_link_by_user($this->link, $this->user);
        undo_upvote_link_by_user($this->link, $this->user);
        $link_vote = find_link_vote_by_link_and_user($this->link, $this->user);
        $this->tester->assertFalse($link_vote);
    }
    
    public function testUndoDownVotingOfLink() {
        downvote_link_by_user($this->link, $this->user);
        undo_downvote_link_by_user($this->link, $this->user);
        $link_vote = find_link_vote_by_link_and_user($this->link, $this->user);
        $this->tester->assertFalse($link_vote);
    }
    
    public function testCannotUndoWrongVoteDirection() {
        downvote_link_by_user($this->link, $this->user);
        undo_upvote_link_by_user($this->link, $this->user);
        $link_vote = find_link_vote_by_link_and_user($this->link, $this->user);
        $this->tester->assertEquals($link_vote['amount'], -1);
    }
}