function openPage(x, y){
        var indice = x;
        var target = y;
        var url = '../views/content/'+ indice +'.php';

        var xml = new XMLHttpRequest();

        xml.onreadystatechange = function(){
            if(xml.readyState == 4 && xml.status == 200){
                document.getElementById(target).innerHTML = xml.
                responseText
            }
        }

        xml.open('GET', url, true);

        xml.send();
}