// document.querySelector("#sRange").onclick = function(){sendAPIfunc('range '  + document.getElementById('startz').value + " " + document.getElementById('stopz').value)};
//
// document.querySelector("#GetParams").onclick = function(){sendAPIfunc('D1M_GET_PARAMS=1')};
// document.querySelector("#SetAzim").onclick = function(){sendAPIfunc('D1M_SET_AZIM=' + document.getElementById('AZIMval').value)};
// document.querySelector("#SetElev").onclick = function(){sendAPIfunc('D1M_SET_ELEV=' + document.getElementById('ELEVval').value)};
// document.querySelector("#SetScanSector").onclick = function(){sendAPIfunc('D1M_SET_AUTOSCAN=6')};
// document.querySelector("#SetJammOn").onclick = function(){sendAPIfunc('D1M_SET_JAMM=1')};
// document.querySelector("#SetJammOff").onclick = function(){sendAPIfunc('D1M_SET_JAMM=0')};
// document.querySelector("#SetScanNoJamm").onclick = function(){sendAPIfunc('D1M_SET_AUTOSCAN=4')};
// document.querySelector("#SetScanJamm").onclick = function(){sendAPIfunc('D1M_SET_AUTOSCAN=5')};
// document.querySelector("#SetScanOn").onclick = function(){sendAPIfunc('D1M_SET_AUTOSCAN=1')};
// document.querySelector("#SetScanOff").onclick = function(){sendAPIfunc('D1M_SET_AUTOSCAN=0')};
//
// document.querySelector("#GetDir3").onclick = function(){sendAPIfunc('D1M_GET_DIR=3')};
// document.querySelector("#GetDir4").onclick = function(){sendAPIfunc('D1M_GET_DIR=4')};
// document.querySelector("#GetScanners").onclick = function(){sendAPIfunc('D1M_GET_SCANNERS=1')};
// document.querySelector("#GetHardware").onclick = function(){sendAPIfunc('D1M_GET_HARDWARE=1')};

function sendAPIfunc(cmmd) {
  const request = new XMLHttpRequest();
  const url = "api/" + cmmd + ".php";
  request.open('GET', url);
  request.addEventListener("readystatechange", () => {
    if (request.readyState === 4 && request.status === 200) {
      // document.getElementById('output').textContent = request.responseText;
      const obj = JSON.parse(request.responseText);
      alert(obj.res);
    }
  });
  request.send();
};
