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

// function Mudarestado(sectionhome) {
//     var display = document.getElementById(sectionhome).style.display;
//     if(display == "none")
//         document.getElementById(el).style.display = 'block';
//     else
//         document.getElementById(el).style.display = 'none';
// }