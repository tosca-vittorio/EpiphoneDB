const progbar_pan = document.getElementById('progbar');
let totalHeight_pan = document.body.scrollHeight - window.innerHeight;
window.onscroll = function()
{let progressHeight = (window.pageYOffset / totalHeight_pan) * 100; progbar_pan.style.height = progressHeight + "%";}
