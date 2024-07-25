const change=(num,id)=>{
    let z=document.getElementsByTagName('a')
    console.log(z.length) 
    for(let i=0;i<z.length;i++)
    {
        if(num!=i)
        {
            z[i].style.color='white';
            z[i].style.textDecorationLine='none';
        }
    }   
    console.log(id)
    let b=document.getElementById(id)
    console.log(b)
    b.style.textDecorationLine='underline';
    b.style.color='#1a9fff';
};
const logochange=(num)=>{
    var z1=document.getElementsByClassName('col')
    var images= ['http://localhost/project/home/images/gta5.jpg','http://localhost/project/home/images/cyberpunk.jpg','http://localhost/project/home/images/fortnite.jpg','http://localhost/project/home/images/miles.jpg','http://localhost/project/home/images/rocketimg.jpg']
    z1[0].style.backgroundImage="url("+images[num]+")";
    console.log(z1[0].style.backgroundImage)

};
document.addEventListener('DOMContentLoaded',function()
{
    var z1=document.getElementsByClassName('col')
    var images= ['http://localhost/project/home/images/gta5.jpg','http://localhost/project/home/images/cyberpunk.jpg','http://localhost/project/home/images/fortnite.jpg','http://localhost/project/home/images/miles.jpg','http://localhost/project/home/images/rocketimg.jpg']
    var ind=0
    function changee()
    {
        z1[0].style.backgroundImage="url("+images[ind]+")"
        ind = (ind + 1) % images.length;
        setTimeout(changee, 5000);
    }
    changee();
});

function size(ind)
{
    var li=["gta","cyberpunk","fortnite","miles"]
    var t=li[ind]
    let z=document.getElementById('t')
    
}

function setCookie(key, value) {
    document.cookie = key + "=" + value + "; path=/";
};
function checkcookie()
{
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        // Check if the cookie matches the expected key and value
        if (cookie.startsWith("my_cookie=0")) {
            // Redirect to the welcome page
            window.location.href = "http://localhost/project/welcome/validation.php";
            alert(" User Signed out..Sign in to continue to home page");
            return;
        }
    }
    window.location.href = "http://localhost/project/home/hp.php";
    return;
};


function showoptions1()
{
    console.log("hi");
    var x=document.getElementById('dropdown-menu');
    if(x[0].style.display='none')
    {
        x[0].style.display='absolute';
    }
    else{
        x[0].style.display='none';
    }
    
};
function showoptions() {
    var dropdownMenu = document.getElementById('dropdown-menu');
    if (dropdownMenu.style.display === 'none') {
      dropdownMenu.style.display = 'flex';
    } else {
      dropdownMenu.style.display = 'none';
    }
    event.stopPropagation();
  }

  // Close dropdown when clicking outside of it
  document.addEventListener('click', function() {
    var dropdownMenu = document.getElementById('dropdown-menu');
    dropdownMenu.style.display = 'none';
  });

function databaseentry(id)
{
            var gamename=['GTA5','CYBERPUNK','FORTNITE','MILESMORALES','ROCKETRACING','RED DEAD REDEMPTION II','FIFA 14','CALL OF DUTY:MODERN WARFARE','MINECRAFT','ASSASSIANS CREED','FORZA HORIZON 5','HOGWARTS LEGACY'];
            var gameprices=[3999,2999,0,1399,599,1299,1599,499,1299,1599,3999,1799];
            var index=id;
            var fixed_gamename=gamename[index];
            var fixed_gameprice=gameprices[index];
            console.log("hi");
            var xhr=new XMLHttpRequest();
            var url = "http://localhost/project/home/hp.php"; // Change this to your PHP script URL
            var params = "gamename=" + encodeURIComponent(fixed_gamename) + "&price=" + encodeURIComponent(fixed_gameprice);
            xhr.open("POST", url, true);
            
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        var response = "sucessfully added to the cart";
                        alert(response); // Display response from the server
                        // Optionally, you can redirect or perform other actions based on the response
                    } 
                }
            };
            xhr.send(params);
}
// Function to update an existing cookie
    function updateCookie(key, newValue) {
        // Split document.cookie into individual cookies
        var cookies = document.cookie.split(';');
        var updatedCookie = key + "=" + newValue + "; path=/";
        // Loop through each cookie to find the one to update
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i].trim();
            // Check if the cookie matches the specified key
            if (cookie.startsWith(key + "=1")) {
                // Update the cookie's value with the new value
                // Set the updated cookie
                console.log(document.cookie);
                document.cookie = updatedCookie;
                return; // Exit the function once the cookie is updated
            }
        }
        // If the cookie doesn't exist, create a new one
        document.cookie = updatedCookie;
    }

// Example usage:
// Assuming you have a cookie named 'my_cookie' with an initial value



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
    
    window.scrollTo({
        top: footerOffsetTop,
        behavior: "smooth"
    });
}
function windowchange(id)
{
    var x=["http://localhost/project/buysection/gta.html","http://localhost/project/buysection/cyberpunk.html","http://localhost/project/buysection/buy.html","http://localhost/project/buysection/miles.html","http://localhost/project/buysection/rocketracing.html"]
    window.location.href=x[id];
}
