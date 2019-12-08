class Errors {

    constructor() {
        this.errors = {};
    }

    has(field) {
        return this.errors[field] != null;
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    record(errors) {
        this.errors = errors;
    }

    clear(field) {
        this.errors[field] = null;
    }
}

export default Errors;
