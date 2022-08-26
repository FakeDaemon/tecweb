<?php
class User{
  public function __construct($conn=NULL) {
    if(isset($conn) && isset($_COOKIE["SessionID"])){
      $stmt = $conn->prepare("SELECT fst_mail, scnd_mail, user_name, profile_pic, psw, role FROM DoomWiki.users WHERE SessID = ?;");
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
        $this->secondaryEmail=$user['scnd_mail'];
        $this->password=$user['psw'];
        $this->role=$user['role'];
      }
    }else{
      $this->user_name = NULL;
    }
  }
  public static function createUser($email, $user_name, $propic){
    $ret = new User();
    $ret->email = $email;
    $ret->user_name = $user_name;
    $ret->profile_pic = $propic;
    return $ret;
  }
  public function isSuperUser(){
    if($this->role==='admin' || $this->role==='mod') return true;
    return false;
  }
  public function isAdmin(){
    if($this->role==='admin') return true;
    return false;
  }
  public function isLogged(){
    if(isset($this->role)) return true;
    return false;
  }
}
?>
