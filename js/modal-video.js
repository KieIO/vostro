function onOpenModal(link) {
    let iframe = document.getElementById("iframe-video-modal");
    let span = document.getElementsByClassName("close")[0];
    var modal = document.getElementById("video-modal");
    if(link){
        iframe.src = link 
        modal.style.display = "block";
    }else{

    }
	span.onclick = function () {
		modal.style.display = "none";
        iframe.src=''
	};
}
