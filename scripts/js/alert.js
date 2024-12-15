class Alert {
    constructor(element, duration = 3000) {
        this.element = element;
        this.duration = duration;
    }

    show() {
        this.element.classList.add('active');
        setTimeout(() => {
            this.hide();
        }, this.duration);
    }

    hide() {
        this.element.classList.remove('active');
    }
}

const successAlert = new Alert(document.getElementById('successAlert'));