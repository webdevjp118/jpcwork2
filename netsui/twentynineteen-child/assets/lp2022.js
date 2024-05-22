var iframe = document.getElementById("id_iframe2022");
// Adjusting the iframe height onload event
iframe.onload = function(){
    iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
}
$('.modal-toggle').on('click', function(e) {
    let person_idx = $(this).attr("person-id");
    e.preventDefault();
    let personRec = person_list.find(person => {
        return Number(person.id) === Number(person_idx);
    });
    if (typeof personRec === "undefined") personRec = { id: 0, imgname: '', name: '', company:'', jobtitle: '', company1:'', jobtitle1:'', bio: '' };
    if (!personRec) personRec = personRec = { id: 0, imgname: '', name: '', company:'', jobtitle: '', company1:'', jobtitle1:'', bio: '' };
    if(personRec.name == '' || personRec.jobtitle == 'COMING SOON') return;
    if(typeof personRec.company == "undefined") personRec.company = "";
    if (person_idx) {
        let msgbodyhtml = '<img class="msgpicture" src="'+uploads_path+'/2020/06/' + personRec.imgname + '">';
        if(isValidObj(personRec.uploadtime)) {
            msgbodyhtml = '<img class="msgpicture" src="'+uploads_path+'/'+ personRec.uploadtime +'/' + personRec.imgname + '">';
        }
        msgbodyhtml += '<font size="5"><b>' + personRec.name + '</b></font><br>';
        msgbodyhtml += '<b>' + personRec.company + ' ' + personRec.jobtitle + '</b><br>';
        if(typeof personRec['company1'] !== "undefined" && personRec['company1'] != '') {
            msgbodyhtml += '<b>' + personRec.company1 + ' ' + personRec.jobtitle1 + '</b><br>';
        }
        msgbodyhtml += '</br>' + personRec.bio;
        
        $('#msgbody').html(msgbodyhtml);
    }
    $('.modal').toggleClass('is-visible');
});
$('.modal-close').on('click', function(e) {
    $('.modal').toggleClass('is-visible');
});
function isValidObj(obj) {
    if(typeof obj === 'undefined') return false;
    if(typeof obj === 'object' && obj) return true;
    if(Array.isArray(obj)) return true;
    if(obj) return true;
    return false;
}
function M() {
    if (null != document.querySelector(".js-hksd")) {
        var t = document.querySelector(".c-hksd"),
            e = document.querySelectorAll(".c-hksd-slider_slide"),
            r = document.querySelector(".c-hksd-slider_slide.active"),
            i = document.querySelector(".c-hksd-progress_bar_line"),
            o = [].slice.call(e),
            a = e.length,
            s = o.indexOf(r),
            u = s,
            c = document.querySelectorAll(".c-hksd-nomax_no span");
        // "mobile" === (new (n(123))).getResult().device.type && t.setAttribute("style", "height:" + window.innerHeight + "px");
        var f = a - 1;
        c[u].classList.add("active"),
            i.classList.add("active");
        setInterval(function() {
            for (var t = 0; t < e.length; t++)
                e[t].classList.remove("active"),
                e[t].classList.remove("pre"),
                c[t].classList.remove("active");
            if (!(u < f))
                return e[u].classList.add("pre"),
                    e[0].classList.add("active"),
                    c[0].classList.add("active"),
                    u = s;
            e[u].classList.add("pre"),
                e[u + 1].classList.add("active"),
                c[u + 1].classList.add("active"),
                u += 1
        }, 7e3)
    }
};
M();

window.onscroll = function() {
    bannerFloating();
};

var mobileMenuH = 0;
var sticky = 0;
var headerEl = null;
var headerEl2 = null;
var wpmMenuEl = null;
window.onload = function() {
    headerEl = document.getElementById("float-banner");
    headerEl2 = document.getElementById("float-banner-second");
    wpmMenuEl = document.getElementById("wprmenu_bar");
    if(headerEl && wpmMenuEl) {
        mobileMenuH = wpmMenuEl.offsetHeight;
        if (mobileMenuH > 0) headerEl.style.top = mobileMenuH;
        sticky = headerEl.offsetHeight;
    }
    if(headerEl2 && wpmMenuEl) {
        mobileMenuH = wpmMenuEl.offsetHeight;
        if (mobileMenuH > 0) headerEl2.style.top = mobileMenuH;
        sticky = headerEl2.offsetHeight;
    }
}

function bannerFloating() {
    console.log(sticky);
    if ((mobileMenuH > 0) && (mobileMenuH <= 55)) {
        if (window.pageYOffset > 1) {
            if (headerEl)
                headerEl.classList.add("mobilesticky");
            if (headerEl2)
                headerEl2.classList.add("mobilesticky");
        } else {
            if (headerEl)
                headerEl.classList.remove("mobilesticky");
            if (headerEl2)
                headerEl2.classList.remove("mobilesticky");
        }
        return;
    }
    if (window.pageYOffset > sticky) {
        if (headerEl)
            headerEl.classList.add("sticky");
        if (headerEl2)
            headerEl2.classList.add("sticky");
    } else {
        if (headerEl)
            headerEl.classList.remove("sticky");
        if (headerEl2)
            headerEl2.classList.remove("sticky");
    }
}