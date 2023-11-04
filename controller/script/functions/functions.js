export default function getRoot() {
  return "http://" + document.location.hostname + "/";
}

$("#backPage").click(function (e) {
  e.preventDefault();
  window.history.back();
});
