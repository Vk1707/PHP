document.getElementById("myForm").addEventListener("submit", function (event) {
    event.preventDefault();
    let form = document.getElementById("myForm");
    let formData = new FormData(form);
    submitForm(formData);
})   


function submitForm(formData){
    console.log(formData);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "adduser.php", true);

    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            if (xhr.responseText == "success"){
                alert("Form is Submitted Successfully");
                document.getElementById("myForm").reset();
                window.location.href = "index.html";
            } if(xhr.responseText == "fail"){
                alert("*Your Mobile No. & Email is Already Register");
            }
        }
    };
    xhr.send(formData);
}