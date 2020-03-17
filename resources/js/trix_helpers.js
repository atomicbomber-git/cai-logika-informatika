export function createMediaElement(attachmentData) {
    let sourceElement = null;

    switch (true) {
        case (attachmentData.contentType.indexOf("audio") !== -1):
            const audioElement = document.createElement("audio");
            audioElement.setAttribute("controls", null);
            audioElement.style.width = "100%";

            sourceElement = document.createElement("source");
            sourceElement.setAttribute("src", attachmentData.url);
            audioElement.appendChild(sourceElement);

            return audioElement;
        case (attachmentData.contentType.indexOf("video") !== -1):
            const videoElement = document.createElement("video");
            videoElement.setAttribute("controls", null);
            videoElement.style.width = "100%";

            sourceElement = document.createElement("source");
            sourceElement.setAttribute("src", attachmentData.url);
            videoElement.appendChild(sourceElement);

            return videoElement;
        default:
            throw new Error(`Unknown media type: ${attachmentData.contentType}`);
    }
}

export function displayTrixAttachments() {
    const attachmentNodes = document.querySelectorAll("figure[data-trix-attachment]");

    for (let i = 0; i < attachmentNodes.length; ++i) {
        const attachmentData = JSON.parse(attachmentNodes[i].dataset.trixAttachment);
        attachmentNodes[i].parentNode.insertBefore(createMediaElement(attachmentData), attachmentNodes[i].nextSibling);
        attachmentNodes[i].remove();
    }
}
