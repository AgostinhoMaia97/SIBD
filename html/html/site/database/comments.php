<?php

  function getTotalOfCommentsOnPost($postid){

    global $dbh;
    $stmt = $dbh->prepare('SELECT COUNT(comment.postid) as numbOfComments FROM comment WHERE postid = ?');
    $stmt->execute(array($postid));
    return $stmt->fetchColumn();
    //return $stmt->fetchAll();

  }
  
  function getCommentsByPostId($postid) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM comment JOIN user USING (username) WHERE postid = ?');
    $stmt->execute(array($postid));
    return $stmt->fetchAll();
  }
  
  function insertCommentsInPost($postid, $content, $username, $published){
    
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO comment (postid, content, username, published) VALUES (?, ?, ?, ?)');
    $stmt->execute(array($postid, $content, $username, $published));
  
  }

  function insertCommentEvaluation($commentid, $commentrate) 
  {
  
    global $dbh;
    
    $stmt = $dbh->prepare('INSERT INTO commentevaluation (username, commentid, number) VALUES (?, ?, ?)');
    $stmt->execute(array($_SESSION["username"],$commentid, $commentrate));
    
    
    $stmt = $dbh -> prepare( 'UPDATE comment
    SET
          commentrate = (SELECT AVG(number) FROM commentevaluation
                                WHERE commentevaluation.commentid = comment.commentid )
    WHERE
        EXISTS (
            SELECT *
            FROM commentevaluation
            WHERE commentevaluation.commentid = comment.commentid 
        )');
    $stmt->execute();
  
  }


  function CheckifCommentRated($commentid)
{
  global $dbh;
    
  $stmt = $dbh->prepare('SELECT number from commentevaluation where commentid = ? AND username = ?');
  $stmt->execute(array($commentid, $_SESSION["username"]));
  return $stmt->fetch();
  
}


function getCommentRate($commentid) 
{

    global $dbh;
    
    $stmt = $dbh->prepare('SELECT AVG(number) AS rating from commentevaluation where commentid = ?');
    $stmt->execute(array($commentid));

    return $stmt->fetch();

}

?>