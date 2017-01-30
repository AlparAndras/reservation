$(document).ready(function() {
  var dTables = [];
  var dBookings = [];
  var dRestaurants = [];
  displayTables();
  displayBookings();
  getAllRestaurants();

  //var sTime = $('#time').timepicker({ 'scrollDefault': 'now' });

  /* HANDLEBARS templates and request */

  function getAllRestaurants() {
    var request = new XMLHttpRequest();
    request.open('GET', "restaurants.json");
    request.onload = function(){
      if(request.status >= 200 && request.status < 400) {
        var data = JSON.parse(request.responseText);
        console.log(data);
        // createHtml(data);
      } else {
        console.log("Connected to the server, but returned an error");
      }

    };

    request.onerror = function() {
      console.log("Connection error");
    };

    request.send();
  }


  // function createHtml(restaurantData) {
  //   var rawTemplate1 = document.getElementById("restaurantTemplateBest").innerHTML;
  //   var rawTemplate2 = document.getElementById("restaurantTemplateCheap").innerHTML;
  //
  //   var compileTemplate1 = Handlebars.compile(rawTemplate1);
  //   var compileTemplate2 = Handlebars.compile(rawTemplate2);
  //   var ourGeneratedHTML1 = compileTemplate1(restaurantData);
  //   var ourGeneratedHTML2 = compileTemplate2(restaurantData);
  //
  //   var restaurantContainer1 = document.getElementById("restaurantBest");
  //   var restaurantContainer2 = document.getElementById("restaurantCheap");
  //   restaurantContainer1.innerHTML = ourGeneratedHTML1;
  //   restaurantContainer2.innerHTML = ourGeneratedHTML2;
  // }

  /****************************** DISPLAY **********************************/

  function displayBookings(){
    $.getJSON("get_bookings.php")
      .done(function(aBookings){
        dBookings = aBookings;
        $("#bookingRows").html("");
        var sBookingHTML = "";
        for (var i = 0; i < dBookings.length; i++) {
          sBookingHTML += '<tr id = ' + dBookings[i].id + '><th scope = "row" style="display:none;">' +
                          dBookings[i].id + '</th><td class = "firstName">' + dBookings[i].firstName +
                          '</td><td class = "lastName">' + dBookings[i].lastName +
                          '</td><td class = "email">' + dBookings[i].email +
                          '</td><td class = "date">' + dBookings[i].date +
                          '</td><td class = "time">' + dBookings[i].time +
                          '</td><td class = "count">' + dBookings[i].count + '</td></tr>';
        }
        $("#bookingRows").html(sBookingHTML);
        $("#bookingDetailRows").html(sBookingHTML);
      });
  }

  function displayTables() {
    $.getJSON("get_tables.php")
      .done(function(aTables){
        dTables = aTables;
        // console.log(dTables.length);
        $("#tableRows").html("");
        var sTablesHTML = "";
        for (var i = 0; i < dTables.length; i++) {
          sTablesHTML += '<tr id = ' + dTables[i].id + '><th scope = "row">' +
                            dTables[i].id + '</th><td class = "numberOfTables">' + dTables[i].number +
                            '</td><td class = "seatNr">' + dTables[i].seatnr +
                            '</td><td class = "availableTables">' + dTables[i].available +
                            '</td><td class = "count">' + dTables[i].count +
                            '</td><td><button class = "btn-default btn" id = "btnEditUser">Edit</button> <button class = "btn-danger btn" id = "btnDelete">Delete</button></td></tr>';
          }
        $("#tableRows").html(sTablesHTML);
    });
  }


/**************************** ADD TABLE/BOOKING ************************************/

  function addNewBooking(form) {
    var sLink = "save_bookings.php";
    $.post(sLink, form.serialize())
      .done(function(message) {
        console.log(message);
        displayBookings();
      })
  }

  function addNewTable(sNrOfTable, sSeatNr, sAvTables, sCount) {
      $("#tableRows").html("");
      var newRow = {};
      newRow.number = sNrOfTable;
      newRow.seatnr = sSeatNr;
      newRow.available = sAvTables;
      newRow.count = sCount;

      dTables.push(newRow);
      console.log(newRow);

      var sLink = "save_ss.php?";

      $.post(sLink, $("#inputForm").serialize())
      .done(function(message) {
        console.log(message);
        displayTables();
      });
  }


  /*********************** Button functions ****************************/

  $(document).on("click", ".btnAddBooking", function(event) {
    //alert($(this).closest("form").attr("id"));
    addNewBooking($(this).closest("form"));
    $("#soundUp")[0].play();
  })


  $(document).on("click", "#btnAddTable", function(event) {
      event.preventDefault();
      var sNrOfTable = $("#numberOfTable").val();
      var sSeatNr = $("#seatNr").val();
      var sAvTables = $("#availableTables").val();
      var sCount = $("#count").val();
      // if( sNrOfTable.length == 0 || sSeatNr.length == 0 || sAvTables.length == 0 || sCount == 0) {
      //
      // } else{
      //   if($.isNumeric(sNrOfTable, sSeatNr, sCount)){
      //       addNewTable(sNrOfTable, sSeatNr, sAvTables, sCount);
      //   }
      // }
      //console.log(sNrOfTable);
      addNewTable(sNrOfTable, sSeatNr, sAvTables, sCount);
      $(".form-control").val("");
  })




  /*********************** SCROLLING ****************************/

  $('.page-scroll a').bind('click', function(event) {
      var $anchor = $(this);
      $('html, body').stop().animate({
          scrollTop: ($($anchor.attr('href')).offset().top - 50)
      }, 1250, 'easeInOutExpo');
      event.preventDefault();
  });

/**************************** NOTIFICATION ************************************/

  $("#btnSend").click(function(){
    var sNameFromTextBox = $("#txtName").val();
    var sLink = "notification.php?name="+sNameFromTextBox
    console.log(sLink);

    $.get(sLink, function(sData){
      console.log(sData);
    });

  });

  // function notifyMe() {
  //       if (!("Notification" in window)) {
  //         alert("This browser does not support desktop notification");
  //       }
  //       else if (Notification.permission === "granted") {
  //
  //       }
  //
  //       else if (Notification.permission !== 'denied') {
  //         Notification.requestPermission(function (permission) {
  //           if (permission === "granted") {
  //             var notification = new Notification("Hi there!");
  //           }
  //         });
  //       }
  //
  //   }
  //   notifyMe();
  //
  //   var theMessage = "";
  //   setInterval(function(){
  //     $.get("messages.txt", function(sData){
  //       $("#lblMessage").text(sData);
  //       if(theMessage != sData){
  //         var notification = new Notification(sData, {
  //           icon: 'img/reserv.png',
  //         });
  //         theMessage = sData;
  //       }
  //     })
  //   }, 1000)
});
