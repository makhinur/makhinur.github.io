users = [
	{"email": "ilyas@gmail.com", "password": "123", "full_name": "Ilyas Zhuanyshev"},
	{"email": "almas@gmail.com", "password": "asdasd", "full_name": "Almas Zhuanyshev"},
	{"email": "erik@gmail.com", "password": "zxczxc", "full_name": "Erik Zhuanyshev"},
	{"email": "serik@gmail.com", "password": "qweqwe", "full_name": "Serik Zhuanyshev"},
	{"email": "berik@gmail.com", "password": "qweqwe", "full_name": "Berik Zhuanyshev"},
	{"email": "madina@gmail.com", "password": "qweqwe", "full_name": "Madina Zhuanysheva"}
];


posts = [
	{
		title:"Post #1",
		content:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod",
		author:"Author",
		date: "Tue Nov 17 2020 11:24:12 GMT+0600 (East Kazakhstan Time)"
	},
	{
		title:"Post #2",
		content:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod",
		author:"Author",
		date: "Tue Nov 21 2020 13:30:52 GMT+0600 (East Kazakhstan Time)"
	},
	{
		title:"Post #3",
		content:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod",
		author:"Author",
		date: "Tue Nov 27 2020 22:18:01 GMT+0600 (East Kazakhstan Time)"
	},
	{
		title:"Post #4",
		content:"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod",
		author:"Author",
		date: "Tue Dec 01 2020 15:59:43 GMT+0600 (East Kazakhstan Time)"
	}
];


function refreshPosts() {
	div = document.getElementById("card");
	div.innerHTML = "";

	for(i=0; i <= posts.length; i++) {
	 	card = document.createElement("div");
	 	card.setAttribute("class", "card my-4");
		cardBody = document.createElement("div");
		cardBody.setAttribute("class", "card-body");
		postTitle = document.createElement("h5");
		postTitle.setAttribute("class", "card-title h1");
		postTitle.innerHTML = posts[posts.length-1-i]["title"];
		postContent = document.createElement("p");
		postContent.setAttribute("class", "card-text h6 my-4");
		postContent.innerHTML = posts[posts.length-1-i]["content"];
		postBtn = document.createElement("a");
		postBtn.setAttribute("class", "btn btn-primary text-light");
		postBtn.innerHTML = "Read more";
		cardBody.appendChild(postTitle);
		cardBody.appendChild(postContent);
		cardBody.appendChild(postBtn);
		cardFooter = document.createElement("div");
		cardFooter.setAttribute("class", "card-footer");
		cardFooter.innerHTML = "Postded by <a href = '£' style='text-decoration: underline; color: black;'>" + posts[posts.length-1-i]["author"] + "</a> on " + posts[posts.length-1-i]["date"];

		card.appendChild(cardBody);
		card.appendChild(cardFooter);
		div.appendChild(card);
	}
}

function addPost() {
	title = document.getElementById("postTitleInput");
	content = document.getElementById("postContentInput");
	author = document.getElementById("postAuthorInput");
	date = new Date();
	if(author != "") {
		newPost = {"title": title.value, "content": content.value, "author": author.value, "date": date};
		posts.push(newPost);
	}
	document.getElementById("postTitleInput").value = "";
	document.getElementById("postContentInput").value = "";
	document.getElementById("postAuthorInput").value = "";
	blogPage();
	refreshPosts();
}



currentPage = $("#mainPage");
currentForm = $("#emailForm");
currentBlock = $("#loginPage");
email = document.getElementById("emailInput");

function passwordForm() {
	if(email.value !="") {

		currentForm.fadeOut(function(){
		$("#passwordForm").fadeIn();
		});
		currentForm = $("#passwordForm");
	}
}

function emailForm() {
	currentForm.fadeOut(function(){
		$("#emailForm").fadeIn();
	});
	currentForm = $("#emailForm");
}

function profilePage(){
	currentBlock.fadeOut(function(){
		$("#loginPage").fadeIn();
	});
	currentBlock = $("#loginPage");
	currentForm.fadeOut(function(){
		$("#profilePage").fadeIn();	
	});
	currentForm = $("#profilePage");
}

function homePage() {
	currentPage.fadeOut(function(){
		$("#mainPage").fadeIn();
	});
	currentPage = $("#mainPage");
	currentBlock.fadeOut(function(){
		$("#loginPage").fadeIn();
	});
	currentBlock = $("#loginPage");
	currentForm.fadeOut(function(){
		$("#emailForm").fadeIn();
	});
	currentForm = $("#emailForm");
	document.getElementById("result").innerHTML = "";
	document.getElementById("emailInput").value = "";

}
function registerPage() {
	currentBlock.fadeOut(function(){
		$("#registerPage").fadeIn();
	});
	currentBlock = $("#registerPage");
}

function blogPage() {
	currentPage.fadeOut(function(){
		$("#blogPage").fadeIn();
	});
	currentPage = $("#blogPage");
}

currentUser = null;

function addUser() {
	fullName = document.getElementById("registerFullName");
	email = document.getElementById("registerEmail");
	password = document.getElementById("registerPassword");
	if(fullName.value!="" || email.value!="" || password.value!="") {
		newUser = {"email": email.value, "password": password.value, "full_name": fullName.value}
		users.push(newUser);
		document.getElementById("currentUserName").innerHTML = newUser["full_name"];
		document.getElementById("navbarDropdown").innerHTML = newUser["full_name"];
		document.getElementById("unauthorisedUserNav").style.display = "none";
		document.getElementById("authorisedUserNav").style.display = "";
		profilePage();
	}
}


function auth() {
	password = document.getElementById("passwordInput");
	userFound = false;

	for(i=0;i<users.length;i++) {
		if(users[i]["email"] === email.value && users[i]["password"]===password.value) {
			currentUser = users[i];
			found = true;
			break;
		} else {
			found = false;
		}
	}

	if(found) {
		document.getElementById("currentUserName").innerHTML = currentUser["full_name"];
		document.getElementById("navbarDropdown").innerHTML = currentUser["full_name"];
		document.getElementById("unauthorisedUserNav").style.display = "none";
		document.getElementById("authorisedUserNav").style.display = "";
		profilePage();
	} else {
		document.getElementById("result").innerHTML = "*** No user found. Try again ***";
		emailForm();
		document.getElementById("emailInput").value = "";
		document.getElementById("passwordInput").value = "";
	}
}

function logout(){
	currentUser = null;
	document.getElementById("authorisedUserNav").style.display = "none";
	document.getElementById("unauthorisedUserNav").style.display = "";
	homePage();
}


