<?php

class UserStore
{
  private $users = array();

  function addUser($name, $mail, $pass)
  {
    if(isset($this->users[$mail]))
    {
      throw new Exception("Konto ($mail) już istnieje");
    }

    if(strlen($pass)<5)
    {
      throw new Exception("Hasło musi mieć conajmniej 5 znaków");
    }

    $this->users[$mail] = array('pass' => $pass, 'mail' => $mail, 'name' => $name);

    return true;
  }

  function getUser($mail)
  {
    return ($this->users[$mail]);
  }

  function notifyPasswordFailure($mail)
  {
      if(isset($this->users[$mail]))
      {
        $this->users[$mail]['fail'] = time();
      }
  }

}



 ?>
