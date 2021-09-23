const uyelikForm=document.querySelector('#register-form');
uyelikForm.addEventListener('submit', (e)=>{

	e.preventDefault();
	const mail=uyelikForm['signup-email'].value;
	const parola= uyelikForm['signup-password'].value;

const kullaniciAdi= uyelikForm['signup-username'].value;

	auth.createUserWithNameAndPassword(mail,parola,kullaniciAdi).then(sonuc=>{

		console.log(sonuc);


	})
		})