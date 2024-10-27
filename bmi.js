let button = document.getElementById('btn');
button.addEventListener("click", () => {
    const height = parseInt(document.getElementById('height').value);
    const weight = parseInt(document.getElementById('weight').value);
    const result = document.getElementById('output');
    let height_status = false, weight_status = false;
    if (height === '' || isNaN(height) || (height <= 50)) {
        alert("Please provide a valid Height");
    } else {
        height_status = true;
    }
    if (weight === '' || isNaN(weight) || (weight <= 20)) {
        alert("Please provide a valid Weight");
    } else {
        weight_status = true;
    }






    if (height_status && weight_status) 
    {
        const bmi = ((weight / height / height) * 10000).toFixed(1);
        //to fixeed is used to get number upto 1 decimal point
        if (bmi < 18.6) {
            result.innerHTML = 'Underweight : ' + bmi;
            const uw = document.getElementById('Underweight');
            uw.innerHTML = 'Click! to Move forward with My BMI'
        }
        else if (bmi >= 18.6 && bmi < 24.9) {
            result.innerHTML = 'Normal : ' + bmi;
            const n = document.getElementById('Normal');
            n.innerHTML = 'Click! to Move forward with My BMI'
        }
        else if (bmi>=24.9 && bmi <30){
            result.innerHTML = 'Overweight :  ' + bmi;
            const ow = document.getElementById('Overweight');
            ow.innerHTML = 'Click! to Move forward with My BMI'
        }
        else if (bmi>=30 && bmi <35){
            result.innerHTML = 'Obesity Class 1 :  ' + bmi;
            const ob1 = document.getElementById('Obesity1');
            ob1.innerHTML = 'Click! to Move forward with My BMI'
        }
        else {
            result.innerHTML = 'Obesity Class 2 :  ' + bmi;
            const ob2 = document.getElementById('Obesity2');
            ob2.innerHTML = 'Click! to Move forward with My BMI'
        }

    }
});