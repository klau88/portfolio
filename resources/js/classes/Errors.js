class Errors {

    constructor() {
        this.errors = {};
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }

    get(field) {
        console.log(field);
        console.log(this.errors);
        if (this.errors[field]) {
            console.log('get ' + field);
            return this.errors[field][0];
        }
    }

    record(errors) {
        // console.log(errors);
        this.errors = errors;
    }

    clear(field) {
        delete this.errors[field];
    }
}

export default Errors;
