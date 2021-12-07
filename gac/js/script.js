let today = new Date();

function currentCopyright() {
    let currentDate = new Date();
    return currentDate.getFullYear();
}

function autoDownload() {
    document.querySelector("#autoDownload").click();
}

//cookies
function addCookie(tag, value) {
    let expireDate = new Date();
    let expireString = "";
    expireDate.setTime(expireDate.getTime() + (1000 * 60 * 60 * 24 * 365) );
    expireString = "expires="+ expireDate.toGMTString();
    document.cookie = tag + "=" + escape(value) + ";" + expireString + ";";
}

 function getCookie(tag) {
    let value = null;
    let myCookie = document.cookie + ";";
    let findTag = tag + "=";
    let endPos;
    if (myCookie.length > 0 ) {
      let beginPos = myCookie.indexOf(findTag);
      if (beginPos != -1) {
        beginPos = beginPos + findTag.length;
        endPos = myCookie.indexOf(";", beginPos);
        if (endPos == -1)
          endPos = myCookie.length;
        value = unescape(myCookie.substring(beginPos, endPos));
      }
    } 
   return value;  
} 