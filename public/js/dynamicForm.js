var child_0 = [];
var count_0 = -1;
var child_1 = [];
var count_1 = -1;

function addFormFun(n) {

    if (n===0) {
        if(count_0===-1){
            document.getElementById("CloneNode_0").style.display = 'block';
            count_0++;
            return;
        }
        let form = document.createElement("div");

        let NODE = document.getElementById("CloneNode_0").cloneNode(true);

        form.append(NODE);

        document.getElementById("BottomLine_0").appendChild(form);
        child_0[count_0++] = form;
    } else if (n===1) {
        if(count_1===-1){
            document.getElementById("CloneNode_1").style.display = 'block';
            count_1++;
            return;
        }
        document.getElementById("CloneNode_1").style.display = 'block';
        let form = document.createElement("div");

        let NODE = document.getElementById("CloneNode_1").cloneNode(true);

        form.append(NODE);

        document.getElementById("BottomLine_1").appendChild(form);
        child_1[count_1++] = form;
    }

}

function removeFormFun(n) {
    if(n===0){
        if(count_0===0){
            document.getElementById("CloneNode_0").style.display = 'none';
            count_0--;
            return;
        }
        document.getElementById("BottomLine_0").removeChild(child_0[--count_0]);

    }else if (n===1){
        if(count_1===0){
            document.getElementById("CloneNode_1").style.display = 'none';
            count_1--;
            return;
        }
        document.getElementById("BottomLine_1").removeChild(child_1[--count_1]);
    }
}

