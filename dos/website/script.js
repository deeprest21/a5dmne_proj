const serviceLinks = document.querySelectorAll('.service-link');
const serviceDetails = document.querySelector('.service-details');
const serviceTitle = document.querySelector('.service-title');
const serviceImage = document.querySelector('.service-image');
const serviceDescription = document.querySelector('.service-description');
const backToServices = document.querySelector('.back-to-services');

serviceLinks.forEach(link => {
	link.addEventListener('click', e => {
		e.preventDefault();
		const service = link.dataset.service;
		serviceDetails.classList.remove('hidden');
		serviceTitle.textContent = link.previousElementSibling.textContent;
		serviceImage.src = `${service}.jpg`;
		serviceDescription.textContent = `هذه هي خدمة ${link.previousElementSibling.textContent}. يمكنك التواصل معنا للحصول على المزيد من المعلومات حول هذه الخدمة.`;
	});
});

backToServices.addEventListener('click', e => {
	e.preventDefault();
	serviceDetails.classList.add('hidden');
});
