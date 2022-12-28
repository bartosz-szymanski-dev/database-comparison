import axios from 'axios';
export default class TabButtonHandler {
  constructor() {
    this.targetButtonTextContent = '';
    this.buttonLoader = null;
  }
  init() {
    try {
      this.listenToEachButtonClick();
    } catch (e) {
      console.error(e);
    }
  }

  listenToEachButtonClick() {
    const buttonSelector = '#mainTabContent .btn';
    const buttons = [...document.querySelectorAll(buttonSelector)];
    if (!buttons) {
      throw new Error('Buttons are not introduced');
    }

    buttons.forEach((button) => this.listenToSingleButtonClick(button));
  }

  listenToSingleButtonClick(button) {
    button.addEventListener('click', (event) => this.buttonClickCallback(event))
  }

  async buttonClickCallback(event) {
    event.preventDefault();
    const { target } = event;
    this.applyLoader(target);
    const { href } = target;
    const method = target.getAttribute('data-method');
    if (!href || !method) {
      this.removeLoader(target);
      throw new Error('Button is malfunctioned');
    }

    const requestConfig = { url: href, method };
    const { data, status, statusText } = await axios.request(requestConfig);
    if (status < 200 || status >= 300) {
      this.removeLoader(target);
      throw new Error(statusText);
    }

    this.removeLoader(target);
  }

  applyLoader(target) {
    this.targetButtonTextContent = target.textContent;

    const spinnerSpan = document.createElement('span');
    spinnerSpan.classList.add('visually-hidden');
    spinnerSpan.textContent = 'Loading...';

    const spinnerDiv = document.createElement('div');
    spinnerDiv.appendChild(spinnerSpan);
    spinnerDiv.classList.add('spinner-border');
    spinnerDiv.setAttribute('role', 'status');

    target.textContent = '';
    target.appendChild(spinnerDiv);
    this.buttonLoader = spinnerDiv;
  }

  removeLoader(target) {
    target.removeChild(this.buttonLoader);
    target.textContent = this.targetButtonTextContent;
  }
}