const draggbles = document.querySelectorAll(".shallow-draggable")
const containers = document.querySelectorAll(".draggable-container")

draggbles.forEach((draggble) => {
    //for start dragging costing opacity
    draggble.addEventListener("dragstart", () => {
        draggble.classList.add("dragging")
    })

    //for end the dragging opacity costing
    draggble.addEventListener("dragend", () => {
        draggble.classList.remove("dragging")
    })
})
//shit
containers.forEach((container) => {
    container.addEventListener("dragover", function (e) {
        e.preventDefault()
        const afterElement = dragAfterElement(container, e.clientY)
        const dragging = document.querySelector(".dragging")
        if (afterElement == null) {
            container.appendChild(dragging)
        } else {
            container.insertBefore(dragging, afterElement)
        }
    })
})

function dragAfterElement(container, y) {
    const draggbleElements = [...container.querySelectorAll(".shallow-draggable:not(.dragging)")]

    return draggbleElements.reduce(
        (closest, child) => {
            const box = child.getBoundingClientRect()
            const offset = y - box.top - box.height / 2
            if (offset < 0 && offset > closest.offset) {
                return { offset: offset, element: child }
            } else {
                return closest
            }
        },
        { offset: Number.NEGATIVE_INFINITY }
    ).element
}
var app = {
    // поля ввода для
    number: '', // случайное число, которое предлагается
    // представить в 32 и 64 - разрядном формате
    answer: '', // ответ для 32 - разрядного формата
    answer1: '', // ответ для 64 - разрядного формата
    score: '', // автоматически сгенерированная оценка ответов

    checkAnswer: function() {
        var that = this;
        if( !this.checkInputFields() ) return;
        $.ajax({
            method: "get", url: "float.php",
            data: {
                num: this.number.val(),
                ans: this.answer.val(),
                ans1: this.answer1.val()
            },
            dataType: "text",
            success: function(txt) {
                var msg = JSON.parse(txt);
                that.score.val( msg.score );
                $('#BTNSAVE').prop( "disabled", false );
            },
            error: function(req, error) {
                $("#ERRMSG").html("Ошибка связи с сервером!");
            }
        });
    },
    sendScore: function() {
        $.ajax({
            method: "get", url: "score.php",
            data: { score: this.score.val() },
            dataType: "text",
            success: function(txt) {
                $('#moodleScore').html(txt);
            },
            error: function(req, error) {
                $("#ERRMSG").html("Ошибка связи с сервером!");
            }
        });
    },
    checkInputFields: function() {
        var isNumber = /^ *[a-fA-F\d]+ *$/;
        if( !isNumber.test(this.answer.val() ) ) {
            this.answer.addClass('BAD'); this.answer.focus();
            $('#BTNSAVE').prop( "disabled", true );
            return false;
        }
        else {
            this.answer.removeClass('BAD');
        }
        if( !isNumber.test(this.answer1.val() ) ) {
            this.answer1.addClass('BAD'); this.answer1.focus();
            $('#BTNSAVE').prop( "disabled", true );
            return false;
        }
        else {
            this.answer1.removeClass('BAD');
        }
        return true;
    }
}
app.initialize();
