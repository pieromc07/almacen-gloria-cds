import { estudiantes } from "/js/data.js";

export const edades = () => {
    const arr = estudiantes.map((e) => {
        const dateAct = new Date();
        let monthAct = dateAct.getMonth();
        let yearAct = dateAct.getFullYear();
        let dayAct = dateAct.getDate();
        let year = new Date(e.nacimiento).getFullYear();
        let month = new Date(e.nacimiento).getMonth();
        let day = new Date(e.nacimiento).getDate();
        let edad = yearAct - year;

        if (month > monthAct) {
            edad -= 1;
        } else if (month == monthAct) {
            if (day > dayAct) {
                edad -= 1;
            }
        }
        return edad;
    });
    return arr;
};

export const labelsAges = () => [...new Set(edades().sort())];

export const countAges = () => {
    let arr = edades().sort();
    let cont = 0;
    let arr2 = [];

    labelsAges().forEach((e) => {
        arr.forEach((e2) => {
            if (e == e2) {
                cont += 1;
            }
        });
        arr2.push(cont);
        cont = 0;
    });

    return arr2;
};

export const total = () => {
    return estudiantes.length;
};

export const birthdayMonth = () => {
    var mes = new Date().getMonth();
    var count = 0;
    for (const student of estudiantes) {
        const month = new Date(student.nacimiento).getMonth();
        if (month == mes) {
            count++;
        }
    }
    return count;
};

export const gender = (genero) => {
    var count = 0;
    for (const student of estudiantes) {
        const gender = student.sexo;
        if (gender == genero) {
            count++;
        }
    }
    return count;
};

export const countGender = () => {
    let male = 0;
    let female = 0;
    for (const student of estudiantes) {
        const gender = student.sexo;
        gender == 'M' ? male += 1 : female += 1;
    }
    let totalGender = [male,female];
    return totalGender;
};