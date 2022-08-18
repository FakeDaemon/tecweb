<?php
class User{
  public function __construct($conn) {
    if(isset($_COOKIE["SessionID"])){
      $stmt = $conn->prepare("SELECT fst_mail, user_name, profile_pic FROM DoomWiki.users WHERE SessID = ?;");
      $stmt->bind_param("s", $_COOKIE["SessionID"]);
      $stmt->execute();
      $result = $stmt->get_result();
      if($result->num_rows > 1){
        $stmt = $conn->query("UPDATE DoomWiki.users SET SessID = NULL WHERE SessId = ?;");
        $stmt->bind_param("s", $_COOKIE["SessionID"]);
        $stmt->execute();
      }else if($result->num_rows === 1){
        $user = $result->fetch_assoc();
        $this->user_name=$user['user_name'];
        $this->profile_pic=$user['profile_pic'];
        $this->email=$user['fst_mail'];
      }
    }else{
      $this->user_name = NULL;
      $this->profile_pic = NULL;
      $this->email = NULL;
    }
  }
  public function isLogged(){
    if($this->user_name==NULL) return false;
    return true;
  }
}
?>
