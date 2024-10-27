function sendMail(){
    var params = {
        name:document.getElementById("name").value ,
        email : document.getElementById("email").value,
        message : document.getElementById("message").value,
    };
const serviceID = "service_smgyfo2";
const templateId = "template_zu4jigi";
emailjs
.send(serviceID,templateId,params)
.then(
    res => {
        document.getElementById("name").value = "";
        document.getElementById("email").value = "";
        document.getElementById("message").value = "";
        console.log(res);
        alert("Hurray..!!!! Your Message Send Succesfully.");
    }
)
}

