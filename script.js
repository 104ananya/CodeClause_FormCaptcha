function sendEmail() {
  let first = document.getElementById("first").value;
  let last = document.getElementById("last").value;
  let email = document.getElementById("email").value;
  let phone = document.getElementById("phone").value;
  let message = document.getElementById("message").value;

  let body =
    "First Name: " +
    first +
    "<br/> Last Name: " +
    last +
    "<br/> <br/> Contact Number: " +
    phone +
    "<br/> <br/> Email Id: " +
    email +
    "<br/> <br/> Message: " +
    message;

  Email.send({
    SecureToken: "<paste security token that we just generated>",
    To: "contactananya21@gmail.com",
    From: "contactananya21@gmail.com",
    Subject: "Contact Form Query",
    Body: body,
  }).then((message) => alert(message));
}
