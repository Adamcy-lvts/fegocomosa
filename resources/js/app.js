require('./bootstrap');

import Alpine from 'alpinejs';

import Flickity from 'flickity';

import * as FilePond from 'filepond';
import FilePondPluginImageResize from 'filepond-plugin-image-resize';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';
import FilePondPluginImageTransform from 'filepond-plugin-image-transform';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginImageValidateSize from 'filepond-plugin-image-validate-size';
import FilePondPluginImageCrop from 'filepond-plugin-image-crop';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';

import 'flickity/dist/flickity.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
import 'filepond/dist/filepond.min.css';

window.FilePond = FilePond;
window.FilePondPluginImageResize = FilePondPluginImageResize;
window.FilePondPluginFileValidateType = FilePondPluginFileValidateType;
window.FilePondPluginImageExifOrientation = FilePondPluginImageExifOrientation;
window.FilePondPluginImageTransform = FilePondPluginImageTransform;
window.FilePondPluginImagePreview = FilePondPluginImagePreview;
window.FilePondPluginImageValidateSize = FilePondPluginImageValidateSize;
window.FilePondPluginImageCrop = FilePondPluginImageCrop;
window.FilePondPluginFileValidateSize = FilePondPluginFileValidateSize;

window.Flickity = Flickity;
window.Alpine = Alpine;


Alpine.start();
