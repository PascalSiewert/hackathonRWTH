/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var head = false;
var body = false;
var legs = false;
var feet = false;

function headDD()
{
    if (head == false)
    {
      head = true;
      $(".headText").css({"max-height":"50%"});
      $(".headText").css({"opacity":"1"});
      $(".headText").css({"transition":"max-height 1s ease-in"});
    }
    else
    {
       head = false; 
       $(".headText").css({"max-height":"0%"});   
       $(".headText").css({"opacity":"0"});
       $(".headText").css({"transition":"max-height 1s ease-in"});
    }
}

function bodyDD()
{
    if (body == false)
    {
      body = true;
      $(".bodyText").css({"max-height":"50%"});
      $(".bodyText").css({"opacity":"1"});
      $(".bodyText").css({"transition":"max-height 1s ease-in"});
    }
    else
    {
       body = false; 
       $(".bodyText").css({"max-height":"0%"});   
       $(".bodyText").css({"opacity":"0"});
       $(".bodyText").css({"transition":"max-height 1s ease-in"});
    }
}

function legsDD()
{
    if (legs == false)
    {
      legs = true;
      $(".legsText").css({"max-height":"50%"});
      $(".legsText").css({"opacity":"1"});
      $(".legsText").css({"transition":"max-height 1s ease-in"});
    }
    else
    {
       legs = false; 
       $(".legsText").css({"max-height":"0%"});   
       $(".legsText").css({"opacity":"0"});
       $(".legsText").css({"transition":"max-height 1s ease-in"});
    }
}

function feetDD()
{
    if (feet == false)
    {
      feet = true;
      $(".feetText").css({"max-height":"50%"});
      $(".feetText").css({"opacity":"1"});
      $(".feetText").css({"transition":"max-height 1s ease-in"});
    }
    else
    {
       feet = false; 
       $(".feetText").css({"max-height":"0%"});   
       $(".feetText").css({"opacity":"0"});
       $(".feetText").css({"transition":"max-height 1s ease-in"});
    }
}



