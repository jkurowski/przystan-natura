$(document).ready(function() {
    $("#invesmentplan").mapster({
        onClick: function() {
            const f = $(this).attr("data-color");
            if (f !== "red") {
                window.open(this.href, "_self")
            } else {
                return false
            }
        },
        fillOpacity: 0.8,
        onMouseover: function() {
            const f = $(this).attr("data-color");
            if (f === "red") {
                $(this).mapster("set", false).mapster("set", true, {
                    fillColor: "ec2327"
                })
            }
            if (f === "blue") {
                $(this).mapster("set", false).mapster("set", true, {
                    fillColor: "1788c9"
                })
            }
            if (f === "green") {
                $(this).mapster("set", false).mapster("set", true, {
                    fillColor: "3a9019"
                })
            }
            if (f === "orange") {
                $(this).mapster("set", false).mapster("set", true, {
                    fillColor: "de8300"
                })
            }
            if (f === "yellow") {
                $(this).mapster("set", false).mapster("set", true, {
                    fillColor: "dcb308"
                })
            }
        },
        onMouseout: function() {
            $(this).mapster("set", false);
        }
    });
});
