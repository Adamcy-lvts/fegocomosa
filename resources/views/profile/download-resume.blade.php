<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    *,
    ::before,
    ::after {
        --tw-scroll-snap-strictness: proximity;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246 / 0.5);
        --tw-ring-offset-shadow: 0 0 #0000;
        --tw-ring-shadow: 0 0 #0000;
        --tw-shadow: 0 0 #0000;
        --tw-shadow-colored: 0 0 #0000;


    }

    *,
    ::before,
    ::after {
        box-sizing: border-box;
        border-width: 0;
        border-style: solid;
        border-color: #e5e7eb;
    }

    body {
        font-family: Nunito, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        ;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-size: inherit;
        font-weight: inherit;
    }

    blockquote,
    dl,
    dd,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    hr,
    figure,
    p,
    pre {
        margin: 0;
    }

    ol,
    ul,
    menu {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    /* bg-white container mx-auto border border-gray-300 rounded-sm shadow-lg px-10 mt-10 mb-10 */
    .container {
        width: 100%;
        border: solid 1px;
        margin-left: auto;
        margin-right: auto;
        border-radius: 0.125rem;
        margin-bottom: 2.5rem;
        margin-top: 2.5rem;
        --tw-bg-opacity: 1;
        background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
        --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);

    }

    .content-container {
        display: flex;
        flex-direction: row;
        column-gap: 2.5rem;

    }

    .small-container {
        width: 66.666667%;
        padding-top: 0.5rem;
        padding-right: 2.5rem;
    }

    .sidebar {
        width: 33.333333%;
        border-right: solid 0.8px;
        border-color: #e5e7eb;
        padding-top: 1rem;
        padding-left: 2.5rem;


    }

    .detail-header {

        font-size: 0.9rem;
        line-height: 1.75rem;
        font-weight: 500;
        text-transform: uppercase;

    }

    .details {

        /* margin-top: 0.2rem; */
        margin-bottom: 1.2rem;
        font-size: 0.775rem;
        line-height: 1.25rem;

    }

    .contact-list {

        display: flex;
        gap: 0.5rem;
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        margin-top: 0.25rem;
        font-size: 0.775rem;
        line-height: 1.25rem;
    }

    .contact-list svg {
        width: 0.8rem;
    }

    .contact-list .phone {
        width: 0.6rem;
    }

    .list svg {
        width: 0.8rem;
        fill: #374151;
    }

    .list {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        margin-top: 0.25;
        text-decoration: none;
    }

    .contact-list a {
        color: inherit;
        text-decoration: inherit;
    }


    /* PERSONAL INFO SECTION  */
    section .about {
        display: flex;
        gap: 0.75rem;
    }

    section .about h2 {
        text-transform: uppercase;
        font-size: 1rem;
        font-weight: 600;
        line-height: 2rem;
    }

    section .about svg {
        width: 1.3rem;
    }

    section .about-text {
        margin-bottom: 1rem;
        margin-top: 0.5rem;
        font-size: 0.775rem;
        line-height: 1.25rem;

    }

    .personal-info {
        display: flex;
        flex-direction: row;
        gap: 2.5rem;
        font-size: 0.775rem;
        line-height: 1.25rem;
    }

    .personal-info-1 {
        width: 50%;
    }

    .personal-info-1 div {
        display: flex;
        justify-content: space-between;
    }

    section .experience {
        display: flex;
        gap: 0.75rem;
    }

    .heading {
        text-transform: uppercase;
        margin-top: 1rem;
        /* margin-bottom: 0.5rem; */
        padding-bottom: 0.25rem;
        font-size: 1rem;
        font-weight: 600;
        line-height: 2rem;
    }

    section .experience svg {
        width: 1.3rem;
        margin-top: 0.5rem;
    }



    section .experience-text {
        display: flex;
        flex-direction: column;
        position: relative;

    }

    section .experience-text .work-content {
        display: flex;

    }

    section .experience-text .work-content .clock-timeline-container {
        height: 100%;
        width: 1.25rem;
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        top: 0px;
        bottom: 0px;
        right: 0px;
        left: 0px;

    }

    section .experience-text .work-content .clock-timeline-container .line {
        height: 100%;
        background-color: rgb(229 231 235);
        width: 0.125rem;
        pointer-events: none;
        margin-right: 0.4rem;


    }


    section .experience-text .work-content .clock {
        display: inline-flex;
        flex-shrink: 0;
        border-radius: 9999px;
        align-items: center;
        justify-content: center;
        width: 0.85rem;
        height: 0.85rem;
        z-index: 10;
        position: relative;
        color: rgb(229 231 235);
        background-color: rgb(229 231 235);

    }

    section .experience-text .work-content .clock svg {
        width: 0.85rem;
        height: 0.85rem;
    }

    section .experience-text .work-content .text-content {

        flex-grow: 1;
        padding-left: 1.45rem;
        margin-bottom: 1rem;

    }

    section .experience-text .work-content .text-content h2 {

        font-weight: 400;
        font-size: 0.775rem;
        line-height: 1.25rem;
        /* margin-bottom: 0.25rem; */
        letter-spacing: 0.05em;
        color: rgba(17 24 39 1);
        text-transform: uppercase;


    }

    section .experience-text .work-content .text-content h3 {

        font-size: 0.675rem;
        line-height: 1.25rem;

    }

    section .experience-text .work-content .text-content p {
        display: flex;
        justify-content: space-between;
        font-size: 0.675rem;
        line-height: 1.625;

    }

    section .education {
        display: flex;
        gap: 0.75rem;
    }

    section .education svg {
        width: 1.7rem;
        margin-top: 0.5rem;
    }


    header {
        border-bottom: solid 0.8px;
        border-color: #e5e7eb;
    }

    header ul {

        display: flex;
        justify-content: flex-end;
        gap: 0.5rem;
    }

    .header-content {
        display: flex;
        gap: 2.5rem;
        flex-direction: row;
        justify-content: space-between;
        justify-items: center;
        align-items: center;
        margin-bottom: 0.5rem;
    }

    .avatar-container {
        width: 33.333333%;
    }

    .avatar-image {
        background-size: cover;
        background-repeat: no-repeat;
        border-radius: 9999px;
        width: 8rem;
        height: 8rem;
        margin: 0px;
        margin-top: 0.5rem;
        margin-left: auto;
        margin-right: auto;
    }

    .title-container {
        width: 100%;
        text-align: left;
        display: flex;
        flex-direction: column;
        margin-top: 1rem;
        width: 66.777777%;

    }

    .title-container h1 {
        font-size: 1.3rem;
        line-height: 1.75rem;
        font-weight: 700;
        text-transform: uppercase;
        text-align-last: start;

    }

    .title-container p {
        margin-top: 1rem;
        font-size: 0.9rem;
        line-height: 1.75rem;
        text-align-last: start;
    }

    .bg-no-repeat {
        background-repeat: no-repeat;
    }

    .bg-cover {
        background-size: cover;
    }

    .rounded-full {
        border-radius: 9999px;
    }

    .w-52 {
        width: 13rem;
    }

    .h-52 {
        height: 13rem;
    }


    .bg-gray-700 {
        --tw-bg-opacity: 1;
        background-color: rgb(55 65 81 / var(--tw-bg-opacity));
    }

    .footer {
        /* bg-gray-600 text-white text-center text-sm pt-2 */
        margin-top: 1.5rem;
    }

    .footer p {
        background-color: rgb(75 85 99);
        color: rgb(255 255 255);
        text-align: center;
        font-size: 0.875rem;
        /* line-height: 1.25rem; */
        padding-top: 0.5rem;
    }
</style>

<body>
    <div>

        <!-- outer container -->

        <div class="container">

            <!-- header (profile) -->
            <header class="border-b">
                <!-- social icons-->
                {{-- <ul class="">
                    <!-- linkedin -->
                    <li>
                        <a href="https://www.linkedin.com/"
                            class="bg-blue-600 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded"
                            target=”_blank”>
                            <svg class="w-5 h-5 fill-current" role="img" viewBox="0 0 256 256"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M218.123122,218.127392 L180.191928,218.127392 L180.191928,158.724263 C180.191928,144.559023 179.939053,126.323993 160.463756,126.323993 C140.707926,126.323993 137.685284,141.757585 137.685284,157.692986 L137.685284,218.123441 L99.7540894,218.123441 L99.7540894,95.9665207 L136.168036,95.9665207 L136.168036,112.660562 L136.677736,112.660562 C144.102746,99.9650027 157.908637,92.3824528 172.605689,92.9280076 C211.050535,92.9280076 218.138927,118.216023 218.138927,151.114151 L218.123122,218.127392 Z M56.9550587,79.2685282 C44.7981969,79.2707099 34.9413443,69.4171797 34.9391618,57.260052 C34.93698,45.1029244 44.7902948,35.2458562 56.9471566,35.2436736 C69.1040185,35.2414916 78.9608713,45.0950217 78.963054,57.2521493 C78.9641017,63.090208 76.6459976,68.6895714 72.5186979,72.8184433 C68.3913982,76.9473153 62.7929898,79.26748 56.9550587,79.2685282 M75.9206558,218.127392 L37.94995,218.127392 L37.94995,95.9665207 L75.9206558,95.9665207 L75.9206558,218.127392 Z M237.033403,0.0182577091 L18.8895249,0.0182577091 C8.57959469,-0.0980923971 0.124827038,8.16056231 -0.001,18.4706066 L-0.001,237.524091 C0.120519052,247.839103 8.57460631,256.105934 18.8895249,255.9977 L237.033403,255.9977 C247.368728,256.125818 255.855922,247.859464 255.999,237.524091 L255.999,18.4548016 C255.851624,8.12438979 247.363742,-0.133792868 237.033403,0.000790807055">
                                    </path>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <!-- github -->
                        <a href="https://github.com/"
                            class="bg-gray-700 p-2 font-medium text-white inline-flex items-center space-x-2 rounded"
                            target=”_blank”>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="w-5" preserveAspectRatio="xMidYMid meet"
                                viewBox="0 0 24 24">
                                <g fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385c.6.105.825-.255.825-.57c0-.285-.015-1.23-.015-2.235c-3.015.555-3.795-.735-4.035-1.41c-.135-.345-.72-1.41-1.23-1.695c-.42-.225-1.02-.78-.015-.795c.945-.015 1.62.87 1.845 1.23c1.08 1.815 2.805 1.305 3.495.99c.105-.78.42-1.305.765-1.605c-2.67-.3-5.46-1.335-5.46-5.925c0-1.305.465-2.385 1.23-3.225c-.12-.3-.54-1.53.12-3.18c0 0 1.005-.315 3.3 1.23c.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23c.66 1.65.24 2.88.12 3.18c.765.84 1.23 1.905 1.23 3.225c0 4.605-2.805 5.625-5.475 5.925c.435.375.81 1.095.81 2.22c0 1.605-.015 2.895-.015 3.3c0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"
                                        fill="currentColor" />
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <!-- tech blog -->
                        <a href="https://dev.to/"
                            class="bg-black p-2 font-medium text-white inline-flex items-center space-x-2 rounded"
                            target=”_blank”>
                            <svg class="w-5 h-5" role="img" aria-hidden="true" preserveAspectRatio="xMidYMid meet"
                                viewBox="0 32 447.99999999999994 448" xmlns="http://www.w3.org/2000/svg" width="2500"
                                height="2321">
                                <g fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M120.12 208.29c-3.88-2.9-7.77-4.35-11.65-4.35H91.03v104.47h17.45c3.88 0 7.77-1.45 11.65-4.35s5.82-7.25 5.82-13.06v-69.65c-.01-5.8-1.96-10.16-5.83-13.06zM404.1 32H43.9C19.7 32 .06 51.59 0 75.8v360.4C.06 460.41 19.7 480 43.9 480h360.2c24.21 0 43.84-19.59 43.9-43.8V75.8c-.06-24.21-19.7-43.8-43.9-43.8zM154.2 291.19c0 18.81-11.61 47.31-48.36 47.25h-46.4V172.98h47.38c35.44 0 47.36 28.46 47.37 47.28zm100.68-88.66H201.6v38.42h32.57v29.57H201.6v38.41h53.29v29.57h-62.18c-11.16.29-20.44-8.53-20.72-19.69V193.7c-.27-11.15 8.56-20.41 19.71-20.69h63.19zm103.64 115.29c-13.2 30.75-36.85 24.63-47.44 0l-38.53-144.8h32.57l29.71 113.72 29.57-113.72h32.58z"
                                        fill="currentColor" />
                                </g>
                            </svg>
                        </a>
                    </li>
                </ul> --}}
                <div class="header-content">
                    <div class="avatar-container">
                        <div class="avatar-image"
                            style="background-image: url({{ asset('storage/' . $member->profile_photo_path) }})">

                        </div>
                    </div>
                    <div class="title-container ">
                        <h1 class="">{{ $member->first_name . ' ' . $member->last_name }}</h1>
                        <p class="">{{ $member->profession }}
                        </p>
                    </div>
                </div>
            </header>
            <!-- detailed info -->
            <main class="content-container">
                <div class="sidebar">
                    <!-- contact details -->
                    <strong class="detail-header">Contact Details</strong>
                    <ul class="details">
                        <li class="contact-list">
                            <svg class="phone" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                viewBox="0 0 326.403 567.998">
                                <path fill="#3B4246"
                                    d="M282.271 52.249H96.229V28.604C96.229 12.808 83.42 0 67.626 0 51.828 0 39.02 12.808 39.02 28.604v23.95C17.135 55.111 0 73.834 0 96.382v427.482c0 24.275 19.858 44.133 44.133 44.133h238.138c24.27 0 44.133-19.857 44.133-44.133V96.382c-.001-24.275-19.864-44.133-44.133-44.133zM121.819 419.992c0 2.552-3.721 4.64-8.274 4.64H45.767c-4.548 0-8.27-2.088-8.27-4.64v-40.648c0-2.547 3.721-4.634 8.27-4.634h67.778c4.553 0 8.274 2.087 8.274 4.634v40.648zm65.02 0c0 2.552-2.093 4.64-4.634 4.64h-38.006c-2.542 0-4.629-2.088-4.629-4.64v-40.648c0-2.547 2.088-4.634 4.629-4.634h38.006c2.541 0 4.634 2.087 4.634 4.634v40.648zm102.072 0c0 2.552-3.787 4.64-8.416 4.64h-68.973c-4.629 0-8.421-2.088-8.421-4.64v-40.648c0-2.547 3.792-4.634 8.421-4.634h68.973c4.629 0 8.416 2.087 8.416 4.634v40.648zm0-88.473c0 13.564-11.099 24.663-24.658 24.663H62.15c-13.56 0-24.653-11.099-24.653-24.663V115.332c0-13.564 11.094-24.658 24.653-24.658h202.103c13.56 0 24.658 11.094 24.658 24.658v216.187z" />
                            </svg>
                            <p>{{ $member->phone }}</p>
                        </li>
                        <li class="contact-list">
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 604 440.95">
                                <g fill="#3B4246">
                                    <path
                                        d="M0 92.913v298.618l179.517-149.339zM556.322 0H47.669C24.201 0 4.572 17.178.697 39.576l237.31 197.352 39.55 32.892c13.443 11.188 35.42 11.188 48.875 0l41.566-34.563 235.293-195.68C599.42 17.178 579.791 0 556.322 0zM604 391.531V92.913L424.476 242.192z" />
                                    <path
                                        d="m358.556 297.019-32.132 26.718c-13.447 11.181-35.44 11.181-48.867 0l-41.438-34.465-24.204-20.126L17.937 430.455c8.17 6.545 18.509 10.495 29.732 10.495h508.653c11.224 0 21.559-3.95 29.725-10.495l-193.989-161.31-33.502 27.874z" />
                                </g>
                            </svg>
                            <p>{{ $member->email }}</p>
                        </li>
                        <li class=" contact-list">
                            <svg class="location" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                viewBox="0 0 407.061 594">
                                <g fill="#3B4246">
                                    <path
                                        d="M269.579 206.276c0-36.487-29.58-66.05-66.042-66.05-36.474 0-66.042 29.563-66.042 66.05 0 36.471 29.568 66.034 66.042 66.034 36.462 0 66.042-29.563 66.042-66.034zM263.124 525.028c-15.166 16.068-28.266 28.804-37.352 37.347-6.318 5.933-13.922 9.065-22.004 9.065-5.859 0-14.687-1.709-23.382-9.92-8.904-8.395-21.643-20.83-36.435-36.492-31.503 6.608-52.457 18.299-52.457 31.625 0 20.625 50.161 37.347 112.042 37.347 61.871 0 112.031-16.722 112.031-37.347 0-13.326-20.945-25.007-52.443-31.625z" />
                                    <path
                                        d="M166.996 521.354c.008 0 .014.005.024.01 1.305 1.345 2.582 2.663 3.834 3.939.211.211.406.406.617.612a412.664 412.664 0 0 0 2.975 3.016c.295.307.593.602.889.896.915.918 1.813 1.819 2.692 2.695.243.231.475.475.712.701a573.742 573.742 0 0 0 6.259 6.159c.261.259.517.496.772.744.673.664 1.34 1.302 1.983 1.919.319.316.643.622.957.918.604.585 1.184 1.134 1.75 1.682.269.259.541.518.807.765.788.749 1.55 1.482 2.275 2.162.812.76 1.64 1.43 2.471 1.999.261.206.546.321.822.501.551.348 1.107.696 1.667.954.34.158.672.237 1.021.369.493.19.997.396 1.508.512.354.101.707.116 1.068.164.48.073.962.163 1.437.168.082 0 .163.032.232.032.377 0 .744-.085 1.115-.116.336-.031.673-.048 1.002-.105.47-.095.941-.259 1.406-.406.301-.105.614-.169.92-.301.512-.216 1.023-.517 1.514-.812.242-.147.501-.248.743-.401a19.812 19.812 0 0 0 2.167-1.729c.75-.701 1.541-1.455 2.363-2.241.174-.152.348-.332.517-.485.728-.69 1.487-1.402 2.257-2.151.148-.143.279-.274.433-.427a768.2 768.2 0 0 0 9.798-9.545c.037-.042.074-.085.115-.121a941 941 0 0 0 11.586-11.718c.117-.121.227-.243.354-.358h-.006c58.578-60.376 167.01-188.604 167.01-310.511C407.061 94.4 311.407 0 203.536 0 95.665 0 0 94.4 0 210.843c0 121.9 108.422 250.13 166.996 310.511zM94.007 206.276c0-60.492 49.032-109.529 109.529-109.529 60.478 0 109.517 49.038 109.517 109.529 0 60.486-49.039 109.524-109.517 109.524-60.497 0-109.529-49.038-109.529-109.524z" />
                                </g>
                            </svg>
                            <p>{{ $member->address }}</p>
                        </li>
                    </ul>
                    <!-- skills -->
                    <strong class="detail-header">Skills</strong>
                    <ul class="details">
                        @foreach ($member->skills as $skill)
                            <li class="list">{{ $skill->skill_name }}</li>
                        @endforeach
                        {{-- <li class="list">CSS</li>
                        <li class="list">JavaScript</li>
                        <li class="list">React</li>
                        <li class="list">Node.js</li> --}}
                        <!--progress bar #1-->

                    </ul>

                    <strong class="detail-header">Interests & Hobbies</strong>
                    <ul class="details">
                        @foreach ($member->hobbies as $hobby)
                            <li class="list">{{ $hobby->hobby_name }}</li>
                        @endforeach
                        {{-- <li class="list">New technologies</li>
                        <li class="list">Blogging on dev.to</li>
                        <li class="list">Investment</li>
                        <li class="list">Travel</li> --}}
                    </ul>

                    <strong class="detail-header">references</strong>
                    <ul class="details">
                        @foreach ($member->references as $reference)
                            <div style="margin-bottom: 1rem;">
                                <li class="list">
                                    {{ $reference->full_name }}
                                </li>
                                <li class="list">{{ $reference->job_title }}</li>
                                <li class="list">
                                    {{ $reference->email }}
                                </li>
                            </div>
                        @endforeach
                    </ul>
                </div>
                <!-- info -->
                <div class="small-container">
                    <section>
                        <!-- about me -->
                        <div class="about">
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 540.95 608.857">
                                <g fill="#3B4246">
                                    <path
                                        d="M150.568 248.181c28.711 68.264 83.418 105.409 119.909 105.409 35.849 0 86.086-35.902 115.204-103.285 7.065-16.37 13.179-37.27 17.438-57.702 4.752-16.343 7.384-37.07 7.384-63.553C410.503 59.042 347.807 0 270.478 0 193.19 0 130.494 59.042 130.494 129.05c0 18.467 1.141 34.14 3.254 47.472 2.832 24.3 8.305 51.626 16.82 71.659zM518.048 447.648c-27.994-29.919-106.674-22.427-145.576-42.983-17.292 32.352-17.524 85.513-46.232 85.513-1.227 0-2.508-.092-3.843-.303-43.259-6.486-21.633-116.82-51.919-116.82s-8.651 110.334-51.913 116.82a24.582 24.582 0 0 1-3.849.303c-28.705 0-28.938-53.161-46.229-85.513-38.878 20.557-117.566 13.064-145.45 42.983C7.873 463.859 0 564.253 0 608.857h540.95c0-44.604-7.821-144.998-22.902-161.209z" />
                                </g>
                            </svg>
                            <h2>About</h2>
                        </div>
                        <p class="about-text">{{ $member->about_you }}
                        </p>

                    </section>

                    <section>
                        <!-- Personal Info -->
                        <div class="personal-info">
                            <div class="personal-info-1">
                                <div>
                                    <div>Date of Birth</div>
                                    <div>{{ $member->date_of_birth }}</div>
                                </div>

                                <div>
                                    <div>Sex</div>
                                    <div>{{ $member->gender->gender }}</div>
                                </div>
                                <div>
                                    <div>Marital Status</div>
                                    <div>{{ $member->maritalStatus->marital_status }}</div>
                                </div>
                            </div>

                            <div class="personal-info-1">
                                <div>
                                    <div>State of Origin</div>
                                    <div>{{ $member->state->name }}</div>
                                </div>

                                <div>
                                    <div>LGA</div>
                                    <div>{{ $member->city->name }}</div>
                                </div>
                                <div>
                                    <div>Nationality</div>
                                    <div>Nigeria</div>
                                </div>
                            </div>
                        </div>

                    </section>

                    <section>
                        <!-- work experiences -->
                        @if ($member->experiences->isNotEmpty())
                            <div class="experience">
                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                    viewBox="0 0 650.384 584.377">
                                    <g fill="#3B4246">
                                        <path
                                            d="M218.207 103.194h15.596c7.66 0 14.114-3.473 14.114-7.595V53.12c0-5.045 4.262-9.297 9.289-9.297h135.962c5.032 0 9.286 4.251 9.286 9.297v42.941c0 3.808 6.6 7.133 14.111 7.133h15.601c7.507 0 14.116-3.325 14.116-7.133V53.12c0-29.299-23.828-53.12-53.114-53.12H257.206c-29.276 0-53.112 23.821-53.112 53.12v41.784c0 4.503 6.467 8.29 14.113 8.29zM303.706 404.509h42.972c7.787 0 14.116-6.329 14.116-14.111v-16.047c0-7.787-6.329-14.111-14.116-14.111h-42.972c-7.785 0-14.12 6.324-14.12 14.111v16.047c0 7.782 6.335 14.111 14.12 14.111zM289.586 464.166c0 7.787 6.334 14.111 14.12 14.111h42.972c7.787 0 14.116-6.324 14.116-14.111v-21.178c0-7.777-6.329-14.111-14.116-14.111h-42.972c-7.785 0-14.12 6.334-14.12 14.111v21.178z" />
                                        <path
                                            d="M613.984 379.321a413.103 413.103 0 0 1-10.262 3.662c-69.005 23.771-143.199 38.257-220.702 43.112v27.377c0 23.969-19.518 43.476-43.486 43.476h-28.695c-23.968 0-43.48-19.507-43.48-43.476V426.08c-83.677-5.224-163.215-21.623-236.552-48.762-2.102-.612-5.936-2.096-15.186-5.8l-1.193-.473c-.524-.213-1.038-.409-1.541-.612v178.343c0 19.632 15.969 35.601 35.587 35.601h553.422c19.626 0 35.59-15.969 35.59-35.601V370.195c-2.485 1.001-5.162 2.07-7.942 3.17l-15.56 5.956z" />
                                        <path
                                            d="M615.868 130.04H34.516C15.479 130.04 0 145.523 0 164.566V318.86c0 3.621 3.637 9.203 6.941 10.661.102.047 6.368 2.802 16.56 6.848 73.685 29.323 157.897 47.657 243.956 53.266v-25.93c0-17.203 25.953-28.934 43.382-28.934h28.695c20.243 0 43.351 13.287 42.884 33.488v21.386c74.754-4.814 146.852-18.827 213.305-41.723 20.976-7.227 47.491-18.516 47.761-18.63 3.305-1.406 6.9-6.858 6.9-10.433V164.566c0-19.043-15.502-34.526-34.516-34.526z" />
                                    </g>
                                </svg>
                                <h2 class="heading">
                                    Work Experiences
                                </h2>
                            </div>
                            <div class="experience-text ">
                                @foreach ($member->experiences as $experience)
                                    <div class="work-content">
                                        <div class="clock-timeline-container">
                                            <div class="line"></div>
                                        </div>
                                        <div class="clock">
                                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                viewBox="0 0 526.001 525.994" stroke-width="2">
                                                <g fill="#3B4246">
                                                    <path
                                                        d="M262.998 0c-76.976 0-146.33 33.239-194.475 86.125C25.978 132.865 0 194.958 0 263.01c0 145.018 117.98 262.984 262.998 262.984 68.062 0 130.163-25.978 176.907-68.551 52.866-48.136 86.096-117.472 86.096-194.433C526.001 117.98 408.021 0 262.998 0zm151.864 432.431c-36.214 32.492-82.864 53.585-134.297 57.541v-34.234c0-9.661-7.906-17.567-17.567-17.567-9.657 0-17.563 7.906-17.563 17.567v34.234c-5.926-.449-11.772-1.187-17.568-2.083-97.493-15.167-174.586-92.255-189.758-189.759-.906-5.785-1.634-11.632-2.087-17.558h34.243c9.657 0 17.563-7.911 17.563-17.563 0-9.664-7.906-17.567-17.563-17.567H36.022c3.951-51.446 25.053-98.097 57.554-134.315 38.021-42.382 91.667-70.484 151.859-75.107v34.24c0 9.65 7.905 17.561 17.563 17.561 9.661 0 17.567-7.91 17.567-17.561V36.02C392.19 44.598 481.4 133.794 489.974 245.442H455.74c-9.657 0-17.567 7.903-17.567 17.567 0 9.652 7.91 17.563 17.567 17.563h34.233c-4.618 60.193-32.72 113.834-75.111 151.859z" />
                                                    <path
                                                        d="M447.708 178.813c-2.078-4.392-7.35-6.229-11.707-4.13l-151.788 72.799c-4.792-6.559-12.478-10.843-21.215-10.843-10.241 0-19.015 5.9-23.377 14.427l-82.779-23.762a8.792 8.792 0 0 0-10.876 6.031c-1.331 4.654 1.359 9.513 6.033 10.876l72.362 20.762 12.944 3.708c2.601 11.828 13.108 20.653 25.693 20.653 2.624 0 5.104-.494 7.485-1.204a26.137 26.137 0 0 0 15.704-12.963c1.672-3.213 2.77-6.762 3.003-10.582l141.133-67.699 13.262-6.36c4.371-2.108 6.225-7.361 4.123-11.713z" />
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="text-content">
                                            <h2>
                                                {{ $experience->employer }}
                                            </h2>
                                            <h3>{{ $experience->job_title }} |
                                                {{ Carbon\Carbon::parse($experience->starting_date)->format('Y') }} -
                                                {{ Carbon\Carbon::parse($experience->completion_date)->format('Y') }}
                                            </h3>
                                            <p>{{ $experience->description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </section>
                    <section>
                        <!-- education -->
                        <div class="education">
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 746.417 422.324">
                                <g fill="#3B4246">
                                    <path
                                        d="M362.512 0 0 135.725l20.179 7.548 342.348 128.155L680.69 152.32l44.34-16.595z" />
                                    <path
                                        d="M145.099 229.567V343.648c0 43.458 97.333 78.676 217.414 78.676 81.409 0 152.313-16.197 189.569-40.156 17.704-11.39 27.85-24.52 27.85-38.52V229.567L362.527 310.95l-217.428-81.383zM724.422 155.585l-15.83 5.883-5.417 39.705-15.758 115.487h59z" />
                                </g>
                            </svg>
                            <h2 class="heading">Education</h2>
                        </div>
                        <div class="experience-text">
                            @foreach ($member->educations as $education)
                                <div class="work-content">
                                    <div class="clock-timeline-container">
                                        <div class="line"></div>
                                    </div>
                                    <div class="clock">
                                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                            viewBox="0 0 526.001 525.994" stroke-width="2">
                                            <g fill="#3B4246">
                                                <path
                                                    d="M262.998 0c-76.976 0-146.33 33.239-194.475 86.125C25.978 132.865 0 194.958 0 263.01c0 145.018 117.98 262.984 262.998 262.984 68.062 0 130.163-25.978 176.907-68.551 52.866-48.136 86.096-117.472 86.096-194.433C526.001 117.98 408.021 0 262.998 0zm151.864 432.431c-36.214 32.492-82.864 53.585-134.297 57.541v-34.234c0-9.661-7.906-17.567-17.567-17.567-9.657 0-17.563 7.906-17.563 17.567v34.234c-5.926-.449-11.772-1.187-17.568-2.083-97.493-15.167-174.586-92.255-189.758-189.759-.906-5.785-1.634-11.632-2.087-17.558h34.243c9.657 0 17.563-7.911 17.563-17.563 0-9.664-7.906-17.567-17.563-17.567H36.022c3.951-51.446 25.053-98.097 57.554-134.315 38.021-42.382 91.667-70.484 151.859-75.107v34.24c0 9.65 7.905 17.561 17.563 17.561 9.661 0 17.567-7.91 17.567-17.561V36.02C392.19 44.598 481.4 133.794 489.974 245.442H455.74c-9.657 0-17.567 7.903-17.567 17.567 0 9.652 7.91 17.563 17.567 17.563h34.233c-4.618 60.193-32.72 113.834-75.111 151.859z" />
                                                <path
                                                    d="M447.708 178.813c-2.078-4.392-7.35-6.229-11.707-4.13l-151.788 72.799c-4.792-6.559-12.478-10.843-21.215-10.843-10.241 0-19.015 5.9-23.377 14.427l-82.779-23.762a8.792 8.792 0 0 0-10.876 6.031c-1.331 4.654 1.359 9.513 6.033 10.876l72.362 20.762 12.944 3.708c2.601 11.828 13.108 20.653 25.693 20.653 2.624 0 5.104-.494 7.485-1.204a26.137 26.137 0 0 0 15.704-12.963c1.672-3.213 2.77-6.762 3.003-10.582l141.133-67.699 13.262-6.36c4.371-2.108 6.225-7.361 4.123-11.713z" />
                                            </g>
                                        </svg>
                                    </div>

                                    <div class="text-content">
                                        <h2>
                                            {{ $education->institution_name }}
                                        </h2>
                                        <p class="">
                                            <span>{{ $education->field_of_study }}</span>
                                            {{ Carbon\Carbon::parse($education->starting_date)->format('Y') }} -
                                            {{ Carbon\Carbon::parse($education->completion_date)->format('Y') }}
                                        </p>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </section>
                </div>
            </main>
            <!-- short lines to introduce myself -->
            <section class="footer">
                <p>The best way to predict the future is to
                    create it. <small>- AbrahamLincoln</small>
                </p>
                <p style="padding-bottom: 1rem;">I am creating my future by learning new
                    things
                    and
                    making small progresses everyday.</p>
            </section>


        </div>
    </div>

</body>

</html>
