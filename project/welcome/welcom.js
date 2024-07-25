function f1() {
    let a=['pmanideep45@gmail.com','mbustudy@gmail.com','pmanideep2@gmail.com']
    let pass=['manideep0030','manideep0031','manideep0032']
    let x = document.getElementById('email');
    if(x.value.length==0)
    {           
        document.getElementsByClassName('fs')[0].style.display='flex';
    }
    else{
        console.log(x.value)
        document.getElementsByClassName('fs')[0].style.display='none';
       let z=0
       for(let i=0;i<x.value.length;i++)
       {
        if(x.value[i]=='@'){
            z=1;
            break
        }
       }
       if(z==0){
        document.getElementsByClassName('fs')[0].style.display='flex';
        x.value=null
       }
        let ind=-1
        for(let i=0;i<a.length;i++)
        {
            if(a[i]==x.value)
            {
                console.log("he is already a user")
                document.getElementById('h4').innerText='Sign in'
                document.getElementById('pass').style.display='flex';
                document.querySelector('.visible').display='flex';
                ind=i
                break
            }
        }
        /*if(ind==-1)
        {
            let wel=document.getElementsByClassName('welcome')
            wel[0].style.display='none'
            console.log(wel[0].style.display)
            document.getElementsByClassName('signup')[0].style.display='block'
            documen
        }*/
        



        if(document.getElementById('pass').value.length!=0)
        {
        if(pass[ind]==document.getElementById('pass').value)
        {
            window.location.href="action.html"
        }
        else{
            document.getElementsByClassName('fs1')[0].style.display='flex';
        }
        }
      
    }

}
function visi() {
    let a = document.getElementById('pass');
    let b = document.querySelector('.visible');
    if (a.type === 'password') {
        a.type = 'text';
        b.innerHTML = '👁️';
    } else {
        a.type = 'password';
        b.innerHTML = '🙈'; 
    }
}
function newen()
{
    let a=document.getElementsByClassName('up');
    let b=document.getElementsByClassName('signu');
    console.log(a[0]);
    a[0].style.display='none';
    b[0].style.display='none';
    let c= document.getElementsByClassName('enter');
    c[0].style.display='flex';
    document.getElementsByClassName('inner')[0].style.display='flex';
    console.log(c[0]) 
}
function delay(){
    let x=function del(){
        let a=document.getElementById('test')
        a.href="#button";
        console.log(a.href)
    }
    setTimeout(x ,2000)
}
function scroll(){
    let b=document.getElementById('button')
    b.scrollIntoView({ behavior: 'smooth' });
}
        // Function to set a cookie
        function setCookie(key, value) {
            document.cookie = key + "=" + value + "; path=/";
        }

        // Function to check the cookie value
        function checkCookie() {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i].trim();
                // Check if the cookie matches the expected key and value
                if (cookie.startsWith("my_cookie=1")) {
                    // Redirect to the welcome page
                    window.location.href = "welcome.html";
                    return;
                }
            }
            // Redirect to the login page if the cookie value is not 1
            window.location.href = "signup.html";
        }
        



        
 

    

