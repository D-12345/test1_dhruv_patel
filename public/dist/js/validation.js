let fnameNode, errNode1, lname, errNode2, emailNode, erremailNode, contactNode, errcontactNode, cityNode, errcityNode
    ,  formNode, imageNode, errimageNode;

$(function () {
    fnameNode = $("#firstname");
    errNode1 = $("#errfname");
    lnameNode = $("#lastname");
    errNode2 = $("#errlname");
    emailNode = $("#email");
    erremailNode = $("#erremail");
    contactNode = $("#contact_number");
    errcontactNode = $("#errcontact");
    cityNode = $("#city");
    errcityNode = $("#errcity");
    imageNode = $("#image");
    errimageNode = $("#errimage");
    formNode = $('#reform');
    formNode1 = $('#reform1');



    fnameNode.blur(function () {
        validatefname();
    });

    lnameNode.blur(function () {
        validatelname();
    });

    emailNode.blur(function () {
        validateemail();
    });

    contactNode.blur(function () {
        validatecontact();
    });

    cityNode.blur(function () {
        validatecity();
    });



    imageNode.blur(function () {
        validateimage();
    });



    formNode.submit(function () {
        return validateform();
    });

});

function validatefname() {
    errNode1.html("");
    //fnameNode.css({border :'2px green solid', backgroundColor : 'cyan' });
    let name = fnameNode.val();
    if (name === "") {
        errNode1.html("<b> This field is required.</b>");
        //fnameNode.css({border :'2px red solid', backgroundColor : 'pink' });
        return false;
    }
    else {
        return true;
    }
}

function validatelname() {
    errNode2.html("");
    //fnameNode.css({border :'2px green solid', backgroundColor : 'cyan' });
    let name = lnameNode.val();
    if (name === "") {
        errNode2.html("<b> This field is required.</b>");
        //lnameNode.css({border :'2px red solid', backgroundColor : 'pink' });
        return false;
    }
    else {
        return true;
    }
}

function validateemail() {
    erremailNode.html("");
    //emailNode.css({border :'2px green solid', backgroundColor : 'cyan' });
    let emailId = emailNode.val();
    let ss = emailId.substring(emailId.indexOf('@') + 1);
    if (emailId === "") {
        erremailNode.html("<b> This field is required.</b>");
        //emailNode.css({border :'2px red solid', backgroundColor : 'pink' });
        return false;
    }
    else if (!emailId.includes("@") || ss === '') {
        erremailNode.html("<b> Invalid Email Id.</b>");
        //emailNode.css({border :'2px red solid', backgroundColor : 'pink' });
        return false;
    }
    else
        return true;
}

function validatecontact() {
    errcontactNode.html("");
    //fnameNode.css({border :'2px green solid', backgroundColor : 'cyan' });
    let name = contactNode.val();
    let regexpress = new RegExp(/^[0-9-+]+$/);
    if (name === "") {
        errcontactNode.html("<b> This field is required.</b>");
        //lnameNode.css({border :'2px red solid', backgroundColor : 'pink' });
        return false;
    }
    else if (regexpress.test(name) == false) {
        errcontactNode.html("<b>Password should contain atleast +/- characters. </b>");
        //passNode.css({border :'2px red solid', backgroundColor : 'pink' });
        return false;
    }
    else if (name.length < 8 || name.length > 14) {
        errcontactNode.html("<b>contact number should contain atleast 8 and max 14 characters..</b>");
        //passNode.css({border :'2px red solid', backgroundColor : 'pink' });
        return false;
    }
    else {
        return true;
    }
}

function validatecity() {
    errcityNode.html("");
    //fnameNode.css({border :'2px green solid', backgroundColor : 'cyan' });
    let name = cityNode.val();
    if (name === "") {
        errcityNode.html("<b> This field is required.</b>");
        //lnameNode.css({border :'2px red solid', backgroundColor : 'pink' });
        return false;
    }
    else {
        return true;
    }
}


function validategender() {
    var x = $("input[type = 'radio'][name = 'gender']:checked");
    if (!x.length > 0) {
      $('#gender').show();
      $('#gender').html('Gender field is required');
      return false;
    }
    else {
      $('#gender').hide();
      return true;
    }
}

function validateimage() {
    errimageNode.html("");
    //fnameNode.css({border :'2px green solid', backgroundColor : 'cyan' });
    let name = imageNode.val();
    var file_size = $('#image')[0].files[0].size;

    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (name === "") {
        errimageNode.html("<b> This field is required.</b>");
        //fnameNode.css({border :'2px red solid', backgroundColor : 'pink' });
        return false;
    }
    else if (file_size > 1024000) {
        errimageNode.html("<b>Invalid file size</b>");
        //imageNode.css({border:'2px red solid',backgroundColor:'pink'});
        return false;
    }
    else if (!allowedExtensions.exec(name)) {
        errimageNode.html("<b>Invalid file type</b>");
        //imageNode.css({border:'2px red solid',backgroundColor:'pink'});
        return false;
    }
    else {
        return true;
    }
}


function validatestatus() {
     var x = $("input[type = 'radio'][name = 'status']:checked");
        if(!x.length > 0) {
        $('#checkstatus').show();
        $('#checkstatus').html('Status field is required');
        return false;
    }
    else {
        $('#checkstatus').hide();
        return true;
    }
}

function validateform() {
    let s1 = validatefname();
    let s2 = validatelname();
    let s3 = validateemail();
    let s4 = validatecontact();
    let s5 = validatecity();
    let s6 = validategender();
    let s7 = validateimage();
    let s8 = validatestatus();

    return (s1 && s2 && s3 && s4 && s5 && s6 && s7 && s8);
}
