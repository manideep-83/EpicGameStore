function show(z)
{
    console.log('clicked');
    var arr=['first','second','third']
    for(var i=0;i<arr.length;i++)
    {
        console.log(arr[i]);
        let z1=document.getElementsByClassName(arr[i]);
        
        if(z-1==i)
        {
            z1[0].style.display='flex';
        }
        else{
            z1[0].style.display='none';
        }
        console.log(z1);
    }
    
}
function scrollToFooter() {
    // Get the footer element
    var footer = document.getElementById("footer");
    // Calculate the offset top of the footer
    var footerOffsetTop = footer.offsetTop;
    // Smooth scroll to the footer
    window.scrollTo({
        top: footerOffsetTop,
        behavior: "smooth"
    });
}
