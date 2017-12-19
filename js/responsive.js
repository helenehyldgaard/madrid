// JavaScript Document

$('.menuMobilKnap').click(function() { // what needs to be activated has to be in the string selectors (button)
    $(".menuMobil").slideToggle('slow');
    $(".menuMobilKnap").toggleClass("expanded");
} 
);