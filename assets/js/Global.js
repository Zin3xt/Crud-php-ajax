$(document).ready(function () {
  Nav();
  Home();
  // Notes();
});
function Home() {
  $.post("pages/Home/mainHome.php", {}, function (data) {
    $("#contents").html(data);
  });
}
function Nav() {
  $.post("nav/Nav.php", {}, function (data) {
    $("#Nav").html(data);
  });
}
function Notes() {
  $.post("pages/NotesInput/note.php", {}, function (data) {
    $("#contents").html(data);
  });
}
let NoteList = [];
