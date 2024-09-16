<?php

/**
 * @file This file is part of the PdfParser library.
 *
 * @author  Dāvis Mosāns <davis.mosans@intelligentsystems.lv>
 *
 * @date    2019-09-17
 *
 * @license LGPLv3
 *
 * @url     <https://github.com/smalot/pdfparser>
 *
 *  PdfParser is a pdf library written in PHP, extraction oriented.
 *  Copyright (C) 2017 - Sébastien MALOT <sebastien@malot.fr>
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Lesser General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Lesser General Public License for more details.
 *
 *  You should have received a copy of the GNU Lesser General Public License
 *  along with this program.
 *  If not, see <http://www.pdfparser.org/sites/default/LICENSE.txt>.
 */

namespace PdfParser\Encoding;

/**
 * Class PostScriptGlyphs
 */
class PostScriptGlyphs
{
    /**
     * The mapping tables have been converted from https://github.com/OpenPrinting/cups-filters/blob/master/fontembed/aglfn13.c,
     * part of the OpenPrinting/cups-filters package, which itself is licensed under the MIT license and lists this specific code part as:
     * Copyright 2008,2012 Tobias Hoffmann under the Expat license (https://www.gnu.org/licenses/license-list.html#Expat)
     */
    public static function getGlyphs(): array
    {
        return [
            'space' => '0x00a0',
            'exclam' => '0x0021',
            'quotedbl' => '0x0022',
            'numbersign' => '0x0023',
            'dollar' => '0x0024',
            'percent' => '0x0025',
            'ampersand' => '0x0026',
            'quotesingle' => '0x0027',
            'parenleft' => '0x0028',
            'parenright' => '0x0029',
            'asterisk' => '0x002a',
            'plus' => '0x002b',
            'comma' => '0x002c',
            'hyphen' => '0x002d',
            'period' => '0x002e',
            'slash' => '0x002f',
            'zero' => '0x0030',
            'one' => '0x0031',
            'two' => '0x0032',
            'three' => '0x0033',
            'four' => '0x0034',
            'five' => '0x0035',
            'six' => '0x0036',
            'seven' => '0x0037',
            'eight' => '0x0038',
            'nine' => '0x0039',
            'colon' => '0x003a',
            'semicolon' => '0x003b',
            'less' => '0x003c',
            'equal' => '0x003d',
            'greater' => '0x003e',
            'question' => '0x003f',
            'at' => '0x0040',
            'A' => '0x0041',
            'B' => '0x0042',
            'C' => '0x0043',
            'D' => '0x0044',
            'E' => '0x0045',
            'F' => '0x0046',
            'G' => '0x0047',
            'H' => '0x0048',
            'I' => '0x0049',
            'J' => '0x004a',
            'K' => '0x004b',
            'L' => '0x004c',
            'M' => '0x004d',
            'N' => '0x004e',
            'O' => '0x004f',
            'P' => '0x0050',
            'Q' => '0x0051',
            'R' => '0x0052',
            'S' => '0x0053',
            'T' => '0x0054',
            'U' => '0x0055',
            'V' => '0x0056',
            'W' => '0x0057',
            'X' => '0x0058',
            'Y' => '0x0059',
            'Z' => '0x005a',
            'bracketleft' => '0x005b',
            'backslash' => '0x005c',
            'bracketright' => '0x005d',
            'asciicircum' => '0x005e',
            'underscore' => '0x005f',
            'grave' => '0x0060',
            'a' => '0x0061',
            'b' => '0x0062',
            'c' => '0x0063',
            'd' => '0x0064',
            'e' => '0x0065',
            'f' => '0x0066',
            'g' => '0x0067',
            'h' => '0x0068',
            'i' => '0x0069',
            'j' => '0x006a',
            'k' => '0x006b',
            'l' => '0x006c',
            'm' => '0x006d',
            'n' => '0x006e',
            'o' => '0x006f',
            'p' => '0x0070',
            'q' => '0x0071',
            'r' => '0x0072',
            's' => '0x0073',
            't' => '0x0074',
            'u' => '0x0075',
            'v' => '0x0076',
            'w' => '0x0077',
            'x' => '0x0078',
            'y' => '0x0079',
            'z' => '0x007a',
            'braceleft' => '0x007b',
            'bar' => '0x007c',
            'braceright' => '0x007d',
            'asciitilde' => '0x007e',
            'exclamdown' => '0x00a1',
            'cent' => '0x00a2',
            'sterling' => '0x00a3',
            'currency' => '0x00a4',
            'yen' => '0x00a5',
            'brokenbar' => '0x00a6',
            'section' => '0x00a7',
            'dieresis' => '0x00a8',
            'copyright' => '0x00a9',
            'ordfeminine' => '0x00aa',
            'guillemotleft' => '0x00ab',
            'logicalnot' => '0x00ac',
            'minus' => '0x2212',
            'registered' => '0x00ae',
            'macron' => '0x02c9',
            'degree' => '0x00b0',
            'plusminus' => '0x00b1',
            'twosuperior' => '0x00b2',
            'threesuperior' => '0x00b3',
            'acute' => '0x00b4',
            'mu' => '0x03bc',
            'paragraph' => '0x00b6',
            'periodcentered' => '0x2219',
            'cedilla' => '0x00b8',
            'onesuperior' => '0x00b9',
            'ordmasculine' => '0x00ba',
            'guillemotright' => '0x00bb',
            'onequarter' => '0x00bc',
            'onehalf' => '0x00bd',
            'threequarters' => '0x00be',
            'questiondown' => '0x00bf',
            'Agrave' => '0x00c0',
            'Aacute' => '0x00c1',
            'Acircumflex' => '0x00c2',
            'Atilde' => '0x00c3',
            'Adieresis' => '0x00c4',
            'Aring' => '0x00c5',
            'AE' => '0x00c6',
            'Ccedilla' => '0x00c7',
            'Egrave' => '0x00c8',
            'Eacute' => '0x00c9',
            'Ecircumflex' => '0x00ca',
            'Edieresis' => '0x00cb',
            'Igrave' => '0x00cc',
            'Iacute' => '0x00cd',
            'Icircumflex' => '0x00ce',
            'Idieresis' => '0x00cf',
            'Eth' => '0x00d0',
            'Ntilde' => '0x00d1',
            'Ograve' => '0x00d2',
            'Oacute' => '0x00d3',
            'Ocircumflex' => '0x00d4',
            'Otilde' => '0x00d5',
            'Odieresis' => '0x00d6',
            'multiply' => '0x00d7',
            'Oslash' => '0x00d8',
            'Ugrave' => '0x00d9',
            'Uacute' => '0x00da',
            'Ucircumflex' => '0x00db',
            'Udieresis' => '0x00dc',
            'Yacute' => '0x00dd',
            'Thorn' => '0x00de',
            'germandbls' => '0x00df',
            'agrave' => '0x00e0',
            'aacute' => '0x00e1',
            'acircumflex' => '0x00e2',
            'atilde' => '0x00e3',
            'adieresis' => '0x00e4',
            'aring' => '0x00e5',
            'ae' => '0x00e6',
            'ccedilla' => '0x00e7',
            'egrave' => '0x00e8',
            'eacute' => '0x00e9',
            'ecircumflex' => '0x00ea',
            'edieresis' => '0x00eb',
            'igrave' => '0x00ec',
            'iacute' => '0x00ed',
            'icircumflex' => '0x00ee',
            'idieresis' => '0x00ef',
            'eth' => '0x00f0',
            'ntilde' => '0x00f1',
            'ograve' => '0x00f2',
            'oacute' => '0x00f3',
            'ocircumflex' => '0x00f4',
            'otilde' => '0x00f5',
            'odieresis' => '0x00f6',
            'divide' => '0x00f7',
            'oslash' => '0x00f8',
            'ugrave' => '0x00f9',
            'uacute' => '0x00fa',
            'ucircumflex' => '0x00fb',
            'udieresis' => '0x00fc',
            'yacute' => '0x00fd',
            'thorn' => '0x00fe',
            'ydieresis' => '0x00ff',
            'Amacron' => '0x0100',
            'amacron' => '0x0101',
            'Abreve' => '0x0102',
            'abreve' => '0x0103',
            'Aogonek' => '0x0104',
            'aogonek' => '0x0105',
            'Cacute' => '0x0106',
            'cacute' => '0x0107',
            'Ccircumflex' => '0x0108',
            'ccircumflex' => '0x0109',
            'Cdotaccent' => '0x010a',
            'cdotaccent' => '0x010b',
            'Ccaron' => '0x010c',
            'ccaron' => '0x010d',
            'Dcaron' => '0x010e',
            'dcaron' => '0x010f',
            'Dcroat' => '0x0110',
            'dcroat' => '0x0111',
            'Emacron' => '0x0112',
            'emacron' => '0x0113',
            'Ebreve' => '0x0114',
            'ebreve' => '0x0115',
            'Edotaccent' => '0x0116',
            'edotaccent' => '0x0117',
            'Eogonek' => '0x0118',
            'eogonek' => '0x0119',
            'Ecaron' => '0x011a',
            'ecaron' => '0x011b',
            'Gcircumflex' => '0x011c',
            'gcircumflex' => '0x011d',
            'Gbreve' => '0x011e',
            'gbreve' => '0x011f',
            'Gdotaccent' => '0x0120',
            'gdotaccent' => '0x0121',
            'Gcommaaccent' => '0x0122',
            'gcommaaccent' => '0x0123',
            'Hcircumflex' => '0x0124',
            'hcircumflex' => '0x0125',
            'Hbar' => '0x0126',
            'hbar' => '0x0127',
            'Itilde' => '0x0128',
            'itilde' => '0x0129',
            'Imacron' => '0x012a',
            'imacron' => '0x012b',
            'Ibreve' => '0x012c',
            'ibreve' => '0x012d',
            'Iogonek' => '0x012e',
            'iogonek' => '0x012f',
            'Idotaccent' => '0x0130',
            'dotlessi' => '0x0131',
            'IJ' => '0x0132',
            'ij' => '0x0133',
            'Jcircumflex' => '0x0134',
            'jcircumflex' => '0x0135',
            'Kcommaaccent' => '0x0136',
            'kcommaaccent' => '0x0137',
            'kgreenlandic' => '0x0138',
            'Lacute' => '0x0139',
            'lacute' => '0x013a',
            'Lcommaaccent' => '0x013b',
            'lcommaaccent' => '0x013c',
            'Lcaron' => '0x013d',
            'lcaron' => '0x013e',
            'Ldot' => '0x013f',
            'ldot' => '0x0140',
            'Lslash' => '0x0141',
            'lslash' => '0x0142',
            'Nacute' => '0x0143',
            'nacute' => '0x0144',
            'Ncommaaccent' => '0x0145',
            'ncommaaccent' => '0x0146',
            'Ncaron' => '0x0147',
            'ncaron' => '0x0148',
            'napostrophe' => '0x0149',
            'Eng' => '0x014a',
            'eng' => '0x014b',
            'Omacron' => '0x014c',
            'omacron' => '0x014d',
            'Obreve' => '0x014e',
            'obreve' => '0x014f',
            'Ohungarumlaut' => '0x0150',
            'ohungarumlaut' => '0x0151',
            'OE' => '0x0152',
            'oe' => '0x0153',
            'Racute' => '0x0154',
            'racute' => '0x0155',
            'Rcommaaccent' => '0x0156',
            'rcommaaccent' => '0x0157',
            'Rcaron' => '0x0158',
            'rcaron' => '0x0159',
            'Sacute' => '0x015a',
            'sacute' => '0x015b',
            'Scircumflex' => '0x015c',
            'scircumflex' => '0x015d',
            'Scedilla' => '0xf6c1',
            'scedilla' => '0xf6c2',
            'Scaron' => '0x0160',
            'scaron' => '0x0161',
            'Tcommaaccent' => '0x021a',
            'tcommaaccent' => '0x021b',
            'Tcaron' => '0x0164',
            'tcaron' => '0x0165',
            'Tbar' => '0x0166',
            'tbar' => '0x0167',
            'Utilde' => '0x0168',
            'utilde' => '0x0169',
            'Umacron' => '0x016a',
            'umacron' => '0x016b',
            'Ubreve' => '0x016c',
            'ubreve' => '0x016d',
            'Uring' => '0x016e',
            'uring' => '0x016f',
            'Uhungarumlaut' => '0x0170',
            'uhungarumlaut' => '0x0171',
            'Uogonek' => '0x0172',
            'uogonek' => '0x0173',
            'Wcircumflex' => '0x0174',
            'wcircumflex' => '0x0175',
            'Ycircumflex' => '0x0176',
            'ycircumflex' => '0x0177',
            'Ydieresis' => '0x0178',
            'Zacute' => '0x0179',
            'zacute' => '0x017a',
            'Zdotaccent' => '0x017b',
            'zdotaccent' => '0x017c',
            'Zcaron' => '0x017d',
            'zcaron' => '0x017e',
            'longs' => '0x017f',
            'florin' => '0x0192',
            'Ohorn' => '0x01a0',
            'ohorn' => '0x01a1',
            'Uhorn' => '0x01af',
            'uhorn' => '0x01b0',
            'Gcaron' => '0x01e6',
            'gcaron' => '0x01e7',
            'Aringacute' => '0x01fa',
            'aringacute' => '0x01fb',
            'AEacute' => '0x01fc',
            'aeacute' => '0x01fd',
            'Oslashacute' => '0x01fe',
            'oslashacute' => '0x01ff',
            'Scommaaccent' => '0x0218',
            'scommaaccent' => '0x0219',
            'afii57929' => '0x02bc',
            'afii64937' => '0x02bd',
            'circumflex' => '0x02c6',
            'caron' => '0x02c7',
            'breve' => '0x02d8',
            'dotaccent' => '0x02d9',
            'ring' => '0x02da',
            'ogonek' => '0x02db',
            'tilde' => '0x02dc',
            'hungarumlaut' => '0x02dd',
            'gravecomb' => '0x0300',
            'acutecomb' => '0x0301',
            'tildecomb' => '0x0303',
            'hookabovecomb' => '0x0309',
            'dotbelowcomb' => '0x0323',
            'tonos' => '0x0384',
            'dieresistonos' => '0x0385',
            'Alphatonos' => '0x0386',
            'anoteleia' => '0x0387',
            'Epsilontonos' => '0x0388',
            'Etatonos' => '0x0389',
            'Iotatonos' => '0x038a',
            'Omicrontonos' => '0x038c',
            'Upsilontonos' => '0x038e',
            'Omegatonos' => '0x038f',
            'iotadieresistonos' => '0x0390',
            'Alpha' => '0x0391',
            'Beta' => '0x0392',
            'Gamma' => '0x0393',
            'Delta' => '0x2206',
            'Epsilon' => '0x0395',
            'Zeta' => '0x0396',
            'Eta' => '0x0397',
            'Theta' => '0x0398',
            'Iota' => '0x0399',
            'Kappa' => '0x039a',
            'Lambda' => '0x039b',
            'Mu' => '0x039c',
            'Nu' => '0x039d',
            'Xi' => '0x039e',
            'Omicron' => '0x039f',
            'Pi' => '0x03a0',
            'Rho' => '0x03a1',
            'Sigma' => '0x03a3',
            'Tau' => '0x03a4',
            'Upsilon' => '0x03a5',
            'Phi' => '0x03a6',
            'Chi' => '0x03a7',
            'Psi' => '0x03a8',
            'Omega' => '0x2126',
            'Iotadieresis' => '0x03aa',
            'Upsilondieresis' => '0x03ab',
            'alphatonos' => '0x03ac',
            'epsilontonos' => '0x03ad',
            'etatonos' => '0x03ae',
            'iotatonos' => '0x03af',
            'upsilondieresistonos' => '0x03b0',
            'alpha' => '0x03b1',
            'beta' => '0x03b2',
            'gamma' => '0x03b3',
            'delta' => '0x03b4',
            'epsilon' => '0x03b5',
            'zeta' => '0x03b6',
            'eta' => '0x03b7',
            'theta' => '0x03b8',
            'iota' => '0x03b9',
            'kappa' => '0x03ba',
            'lambda' => '0x03bb',
            'nu' => '0x03bd',
            'xi' => '0x03be',
            'omicron' => '0x03bf',
            'pi' => '0x03c0',
            'rho' => '0x03c1',
            'sigma1' => '0x03c2',
            'sigma' => '0x03c3',
            'tau' => '0x03c4',
            'upsilon' => '0x03c5',
            'phi' => '0x03c6',
            'chi' => '0x03c7',
            'psi' => '0x03c8',
            'omega' => '0x03c9',
            'iotadieresis' => '0x03ca',
            'upsilondieresis' => '0x03cb',
            'omicrontonos' => '0x03cc',
            'upsilontonos' => '0x03cd',
            'omegatonos' => '0x03ce',
            'theta1' => '0x03d1',
            'Upsilon1' => '0x03d2',
            'phi1' => '0x03d5',
            'omega1' => '0x03d6',
            'afii10023' => '0x0401',
            'afii10051' => '0x0402',
            'afii10052' => '0x0403',
            'afii10053' => '0x0404',
            'afii10054' => '0x0405',
            'afii10055' => '0x0406',
            'afii10056' => '0x0407',
            'afii10057' => '0x0408',
            'afii10058' => '0x0409',
            'afii10059' => '0x040a',
            'afii10060' => '0x040b',
            'afii10061' => '0x040c',
            'afii10062' => '0x040e',
            'afii10145' => '0x040f',
            'afii10017' => '0x0410',
            'afii10018' => '0x0411',
            'afii10019' => '0x0412',
            'afii10020' => '0x0413',
            'afii10021' => '0x0414',
            'afii10022' => '0x0415',
            'afii10024' => '0x0416',
            'afii10025' => '0x0417',
            'afii10026' => '0x0418',
            'afii10027' => '0x0419',
            'afii10028' => '0x041a',
            'afii10029' => '0x041b',
            'afii10030' => '0x041c',
            'afii10031' => '0x041d',
            'afii10032' => '0x041e',
            'afii10033' => '0x041f',
            'afii10034' => '0x0420',
            'afii10035' => '0x0421',
            'afii10036' => '0x0422',
            'afii10037' => '0x0423',
            'afii10038' => '0x0424',
            'afii10039' => '0x0425',
            'afii10040' => '0x0426',
            'afii10041' => '0x0427',
            'afii10042' => '0x0428',
            'afii10043' => '0x0429',
            'afii10044' => '0x042a',
            'afii10045' => '0x042b',
            'afii10046' => '0x042c',
            'afii10047' => '0x042d',
            'afii10048' => '0x042e',
            'afii10049' => '0x042f',
            'afii10065' => '0x0430',
            'afii10066' => '0x0431',
            'afii10067' => '0x0432',
            'afii10068' => '0x0433',
            'afii10069' => '0x0434',
            'afii10070' => '0x0435',
            'afii10072' => '0x0436',
            'afii10073' => '0x0437',
            'afii10074' => '0x0438',
            'afii10075' => '0x0439',
            'afii10076' => '0x043a',
            'afii10077' => '0x043b',
            'afii10078' => '0x043c',
            'afii10079' => '0x043d',
            'afii10080' => '0x043e',
            'afii10081' => '0x043f',
            'afii10082' => '0x0440',
            'afii10083' => '0x0441',
            'afii10084' => '0x0442',
            'afii10085' => '0x0443',
            'afii10086' => '0x0444',
            'afii10087' => '0x0445',
            'afii10088' => '0x0446',
            'afii10089' => '0x0447',
            'afii10090' => '0x0448',
            'afii10091' => '0x0449',
            'afii10092' => '0x044a',
            'afii10093' => '0x044b',
            'afii10094' => '0x044c',
            'afii10095' => '0x044d',
            'afii10096' => '0x044e',
            'afii10097' => '0x044f',
            'afii10071' => '0x0451',
            'afii10099' => '0x0452',
            'afii10100' => '0x0453',
            'afii10101' => '0x0454',
            'afii10102' => '0x0455',
            'afii10103' => '0x0456',
            'afii10104' => '0x0457',
            'afii10105' => '0x0458',
            'afii10106' => '0x0459',
            'afii10107' => '0x045a',
            'afii10108' => '0x045b',
            'afii10109' => '0x045c',
            'afii10110' => '0x045e',
            'afii10193' => '0x045f',
            'afii10146' => '0x0462',
            'afii10194' => '0x0463',
            'afii10147' => '0x0472',
            'afii10195' => '0x0473',
            'afii10148' => '0x0474',
            'afii10196' => '0x0475',
            'afii10050' => '0x0490',
            'afii10098' => '0x0491',
            'afii10846' => '0x04d9',
            'afii57799' => '0x05b0',
            'afii57801' => '0x05b1',
            'afii57800' => '0x05b2',
            'afii57802' => '0x05b3',
            'afii57793' => '0x05b4',
            'afii57794' => '0x05b5',
            'afii57795' => '0x05b6',
            'afii57798' => '0x05b7',
            'afii57797' => '0x05b8',
            'afii57806' => '0x05b9',
            'afii57796' => '0x05bb',
            'afii57807' => '0x05bc',
            'afii57839' => '0x05bd',
            'afii57645' => '0x05be',
            'afii57841' => '0x05bf',
            'afii57842' => '0x05c0',
            'afii57804' => '0x05c1',
            'afii57803' => '0x05c2',
            'afii57658' => '0x05c3',
            'afii57664' => '0x05d0',
            'afii57665' => '0x05d1',
            'afii57666' => '0x05d2',
            'afii57667' => '0x05d3',
            'afii57668' => '0x05d4',
            'afii57669' => '0x05d5',
            'afii57670' => '0x05d6',
            'afii57671' => '0x05d7',
            'afii57672' => '0x05d8',
            'afii57673' => '0x05d9',
            'afii57674' => '0x05da',
            'afii57675' => '0x05db',
            'afii57676' => '0x05dc',
            'afii57677' => '0x05dd',
            'afii57678' => '0x05de',
            'afii57679' => '0x05df',
            'afii57680' => '0x05e0',
            'afii57681' => '0x05e1',
            'afii57682' => '0x05e2',
            'afii57683' => '0x05e3',
            'afii57684' => '0x05e4',
            'afii57685' => '0x05e5',
            'afii57686' => '0x05e6',
            'afii57687' => '0x05e7',
            'afii57688' => '0x05e8',
            'afii57689' => '0x05e9',
            'afii57690' => '0x05ea',
            'afii57716' => '0x05f0',
            'afii57717' => '0x05f1',
            'afii57718' => '0x05f2',
            'afii57388' => '0x060c',
            'afii57403' => '0x061b',
            'afii57407' => '0x061f',
            'afii57409' => '0x0621',
            'afii57410' => '0x0622',
            'afii57411' => '0x0623',
            'afii57412' => '0x0624',
            'afii57413' => '0x0625',
            'afii57414' => '0x0626',
            'afii57415' => '0x0627',
            'afii57416' => '0x0628',
            'afii57417' => '0x0629',
            'afii57418' => '0x062a',
            'afii57419' => '0x062b',
            'afii57420' => '0x062c',
            'afii57421' => '0x062d',
            'afii57422' => '0x062e',
            'afii57423' => '0x062f',
            'afii57424' => '0x0630',
            'afii57425' => '0x0631',
            'afii57426' => '0x0632',
            'afii57427' => '0x0633',
            'afii57428' => '0x0634',
            'afii57429' => '0x0635',
            'afii57430' => '0x0636',
            'afii57431' => '0x0637',
            'afii57432' => '0x0638',
            'afii57433' => '0x0639',
            'afii57434' => '0x063a',
            'afii57440' => '0x0640',
            'afii57441' => '0x0641',
            'afii57442' => '0x0642',
            'afii57443' => '0x0643',
            'afii57444' => '0x0644',
            'afii57445' => '0x0645',
            'afii57446' => '0x0646',
            'afii57470' => '0x0647',
            'afii57448' => '0x0648',
            'afii57449' => '0x0649',
            'afii57450' => '0x064a',
            'afii57451' => '0x064b',
            'afii57452' => '0x064c',
            'afii57453' => '0x064d',
            'afii57454' => '0x064e',
            'afii57455' => '0x064f',
            'afii57456' => '0x0650',
            'afii57457' => '0x0651',
            'afii57458' => '0x0652',
            'afii57392' => '0x0660',
            'afii57393' => '0x0661',
            'afii57394' => '0x0662',
            'afii57395' => '0x0663',
            'afii57396' => '0x0664',
            'afii57397' => '0x0665',
            'afii57398' => '0x0666',
            'afii57399' => '0x0667',
            'afii57400' => '0x0668',
            'afii57401' => '0x0669',
            'afii57381' => '0x066a',
            'afii63167' => '0x066d',
            'afii57511' => '0x0679',
            'afii57506' => '0x067e',
            'afii57507' => '0x0686',
            'afii57512' => '0x0688',
            'afii57513' => '0x0691',
            'afii57508' => '0x0698',
            'afii57505' => '0x06a4',
            'afii57509' => '0x06af',
            'afii57514' => '0x06ba',
            'afii57519' => '0x06d2',
            'afii57534' => '0x06d5',
            'Wgrave' => '0x1e80',
            'wgrave' => '0x1e81',
            'Wacute' => '0x1e82',
            'wacute' => '0x1e83',
            'Wdieresis' => '0x1e84',
            'wdieresis' => '0x1e85',
            'Ygrave' => '0x1ef2',
            'ygrave' => '0x1ef3',
            'afii61664' => '0x200c',
            'afii301' => '0x200d',
            'afii299' => '0x200e',
            'afii300' => '0x200f',
            'figuredash' => '0x2012',
            'endash' => '0x2013',
            'emdash' => '0x2014',
            'afii00208' => '0x2015',
            'underscoredbl' => '0x2017',
            'quoteleft' => '0x2018',
            'quoteright' => '0x2019',
            'quotesinglbase' => '0x201a',
            'quotereversed' => '0x201b',
            'quotedblleft' => '0x201c',
            'quotedblright' => '0x201d',
            'quotedblbase' => '0x201e',
            'dagger' => '0x2020',
            'daggerdbl' => '0x2021',
            'bullet' => '0x2022',
            'onedotenleader' => '0x2024',
            'twodotenleader' => '0x2025',
            'ellipsis' => '0x2026',
            'afii61573' => '0x202c',
            'afii61574' => '0x202d',
            'afii61575' => '0x202e',
            'perthousand' => '0x2030',
            'minute' => '0x2032',
            'second' => '0x2033',
            'guilsinglleft' => '0x2039',
            'guilsinglright' => '0x203a',
            'exclamdbl' => '0x203c',
            'fraction' => '0x2215',
            'zerosuperior' => '0x2070',
            'foursuperior' => '0x2074',
            'fivesuperior' => '0x2075',
            'sixsuperior' => '0x2076',
            'sevensuperior' => '0x2077',
            'eightsuperior' => '0x2078',
            'ninesuperior' => '0x2079',
            'parenleftsuperior' => '0x207d',
            'parenrightsuperior' => '0x207e',
            'nsuperior' => '0x207f',
            'zeroinferior' => '0x2080',
            'oneinferior' => '0x2081',
            'twoinferior' => '0x2082',
            'threeinferior' => '0x2083',
            'fourinferior' => '0x2084',
            'fiveinferior' => '0x2085',
            'sixinferior' => '0x2086',
            'seveninferior' => '0x2087',
            'eightinferior' => '0x2088',
            'nineinferior' => '0x2089',
            'parenleftinferior' => '0x208d',
            'parenrightinferior' => '0x208e',
            'colonmonetary' => '0x20a1',
            'franc' => '0x20a3',
            'lira' => '0x20a4',
            'peseta' => '0x20a7',
            'afii57636' => '0x20aa',
            'dong' => '0x20ab',
            'Euro' => '0x20ac',
            'afii61248' => '0x2105',
            'Ifraktur' => '0x2111',
            'afii61289' => '0x2113',
            'afii61352' => '0x2116',
            'weierstrass' => '0x2118',
            'Rfraktur' => '0x211c',
            'prescription' => '0x211e',
            'trademark' => '0x2122',
            'estimated' => '0x212e',
            'aleph' => '0x2135',
            'onethird' => '0x2153',
            'twothirds' => '0x2154',
            'oneeighth' => '0x215b',
            'threeeighths' => '0x215c',
            'fiveeighths' => '0x215d',
            'seveneighths' => '0x215e',
            'arrowleft' => '0x2190',
            'arrowup' => '0x2191',
            'arrowright' => '0x2192',
            'arrowdown' => '0x2193',
            'arrowboth' => '0x2194',
            'arrowupdn' => '0x2195',
            'arrowupdnbse' => '0x21a8',
            'carriagereturn' => '0x21b5',
            'arrowdblleft' => '0x21d0',
            'arrowdblup' => '0x21d1',
            'arrowdblright' => '0x21d2',
            'arrowdbldown' => '0x21d3',
            'arrowdblboth' => '0x21d4',
            'universal' => '0x2200',
            'partialdiff' => '0x2202',
            'existential' => '0x2203',
            'emptyset' => '0x2205',
            'gradient' => '0x2207',
            'element' => '0x2208',
            'notelement' => '0x2209',
            'suchthat' => '0x220b',
            'product' => '0x220f',
            'summation' => '0x2211',
            'asteriskmath' => '0x2217',
            'radical' => '0x221a',
            'proportional' => '0x221d',
            'infinity' => '0x221e',
            'orthogonal' => '0x221f',
            'angle' => '0x2220',
            'logicaland' => '0x2227',
            'logicalor' => '0x2228',
            'intersection' => '0x2229',
            'union' => '0x222a',
            'integral' => '0x222b',
            'therefore' => '0x2234',
            'similar' => '0x223c',
            'congruent' => '0x2245',
            'approxequal' => '0x2248',
            'notequal' => '0x2260',
            'equivalence' => '0x2261',
            'lessequal' => '0x2264',
            'greaterequal' => '0x2265',
            'propersubset' => '0x2282',
            'propersuperset' => '0x2283',
            'notsubset' => '0x2284',
            'reflexsubset' => '0x2286',
            'reflexsuperset' => '0x2287',
            'circleplus' => '0x2295',
            'circlemultiply' => '0x2297',
            'perpendicular' => '0x22a5',
            'dotmath' => '0x22c5',
            'house' => '0x2302',
            'revlogicalnot' => '0x2310',
            'integraltp' => '0x2320',
            'integralbt' => '0x2321',
            'angleleft' => '0x2329',
            'angleright' => '0x232a',
            'SF100000' => '0x2500',
            'SF110000' => '0x2502',
            'SF010000' => '0x250c',
            'SF030000' => '0x2510',
            'SF020000' => '0x2514',
            'SF040000' => '0x2518',
            'SF080000' => '0x251c',
            'SF090000' => '0x2524',
            'SF060000' => '0x252c',
            'SF070000' => '0x2534',
            'SF050000' => '0x253c',
            'SF430000' => '0x2550',
            'SF240000' => '0x2551',
            'SF510000' => '0x2552',
            'SF520000' => '0x2553',
            'SF390000' => '0x2554',
            'SF220000' => '0x2555',
            'SF210000' => '0x2556',
            'SF250000' => '0x2557',
            'SF500000' => '0x2558',
            'SF490000' => '0x2559',
            'SF380000' => '0x255a',
            'SF280000' => '0x255b',
            'SF270000' => '0x255c',
            'SF260000' => '0x255d',
            'SF360000' => '0x255e',
            'SF370000' => '0x255f',
            'SF420000' => '0x2560',
            'SF190000' => '0x2561',
            'SF200000' => '0x2562',
            'SF230000' => '0x2563',
            'SF470000' => '0x2564',
            'SF480000' => '0x2565',
            'SF410000' => '0x2566',
            'SF450000' => '0x2567',
            'SF460000' => '0x2568',
            'SF400000' => '0x2569',
            'SF540000' => '0x256a',
            'SF530000' => '0x256b',
            'SF440000' => '0x256c',
            'upblock' => '0x2580',
            'dnblock' => '0x2584',
            'block' => '0x2588',
            'lfblock' => '0x258c',
            'rtblock' => '0x2590',
            'ltshade' => '0x2591',
            'shade' => '0x2592',
            'dkshade' => '0x2593',
            'filledbox' => '0x25a0',
            'H22073' => '0x25a1',
            'H18543' => '0x25aa',
            'H18551' => '0x25ab',
            'filledrect' => '0x25ac',
            'triagup' => '0x25b2',
            'triagrt' => '0x25ba',
            'triagdn' => '0x25bc',
            'triaglf' => '0x25c4',
            'lozenge' => '0x25ca',
            'circle' => '0x25cb',
            'H18533' => '0x25cf',
            'invbullet' => '0x25d8',
            'invcircle' => '0x25d9',
            'openbullet' => '0x25e6',
            'smileface' => '0x263a',
            'invsmileface' => '0x263b',
            'sun' => '0x263c',
            'female' => '0x2640',
            'male' => '0x2642',
            'spade' => '0x2660',
            'club' => '0x2663',
            'heart' => '0x2665',
            'diamond' => '0x2666',
            'musicalnote' => '0x266a',
            'musicalnotedbl' => '0x266b',
            'dotlessj' => '0xf6be',
            'LL' => '0xf6bf',
            'll' => '0xf6c0',
            'commaaccent' => '0xf6c3',
            'afii10063' => '0xf6c4',
            'afii10064' => '0xf6c5',
            'afii10192' => '0xf6c6',
            'afii10831' => '0xf6c7',
            'afii10832' => '0xf6c8',
            'Acute' => '0xf6c9',
            'Caron' => '0xf6ca',
            'Dieresis' => '0xf6cb',
            'DieresisAcute' => '0xf6cc',
            'DieresisGrave' => '0xf6cd',
            'Grave' => '0xf6ce',
            'Hungarumlaut' => '0xf6cf',
            'Macron' => '0xf6d0',
            'cyrBreve' => '0xf6d1',
            'cyrFlex' => '0xf6d2',
            'dblGrave' => '0xf6d3',
            'cyrbreve' => '0xf6d4',
            'cyrflex' => '0xf6d5',
            'dblgrave' => '0xf6d6',
            'dieresisacute' => '0xf6d7',
            'dieresisgrave' => '0xf6d8',
            'copyrightserif' => '0xf6d9',
            'registerserif' => '0xf6da',
            'trademarkserif' => '0xf6db',
            'onefitted' => '0xf6dc',
            'rupiah' => '0xf6dd',
            'threequartersemdash' => '0xf6de',
            'centinferior' => '0xf6df',
            'centsuperior' => '0xf6e0',
            'commainferior' => '0xf6e1',
            'commasuperior' => '0xf6e2',
            'dollarinferior' => '0xf6e3',
            'dollarsuperior' => '0xf6e4',
            'hypheninferior' => '0xf6e5',
            'hyphensuperior' => '0xf6e6',
            'periodinferior' => '0xf6e7',
            'periodsuperior' => '0xf6e8',
            'asuperior' => '0xf6e9',
            'bsuperior' => '0xf6ea',
            'dsuperior' => '0xf6eb',
            'esuperior' => '0xf6ec',
            'isuperior' => '0xf6ed',
            'lsuperior' => '0xf6ee',
            'msuperior' => '0xf6ef',
            'osuperior' => '0xf6f0',
            'rsuperior' => '0xf6f1',
            'ssuperior' => '0xf6f2',
            'tsuperior' => '0xf6f3',
            'Brevesmall' => '0xf6f4',
            'Caronsmall' => '0xf6f5',
            'Circumflexsmall' => '0xf6f6',
            'Dotaccentsmall' => '0xf6f7',
            'Hungarumlautsmall' => '0xf6f8',
            'Lslashsmall' => '0xf6f9',
            'OEsmall' => '0xf6fa',
            'Ogoneksmall' => '0xf6fb',
            'Ringsmall' => '0xf6fc',
            'Scaronsmall' => '0xf6fd',
            'Tildesmall' => '0xf6fe',
            'Zcaronsmall' => '0xf6ff',
            'exclamsmall' => '0xf721',
            'dollaroldstyle' => '0xf724',
            'ampersandsmall' => '0xf726',
            'zerooldstyle' => '0xf730',
            'oneoldstyle' => '0xf731',
            'twooldstyle' => '0xf732',
            'threeoldstyle' => '0xf733',
            'fouroldstyle' => '0xf734',
            'fiveoldstyle' => '0xf735',
            'sixoldstyle' => '0xf736',
            'sevenoldstyle' => '0xf737',
            'eightoldstyle' => '0xf738',
            'nineoldstyle' => '0xf739',
            'questionsmall' => '0xf73f',
            'Gravesmall' => '0xf760',
            'Asmall' => '0xf761',
            'Bsmall' => '0xf762',
            'Csmall' => '0xf763',
            'Dsmall' => '0xf764',
            'Esmall' => '0xf765',
            'Fsmall' => '0xf766',
            'Gsmall' => '0xf767',
            'Hsmall' => '0xf768',
            'Ismall' => '0xf769',
            'Jsmall' => '0xf76a',
            'Ksmall' => '0xf76b',
            'Lsmall' => '0xf76c',
            'Msmall' => '0xf76d',
            'Nsmall' => '0xf76e',
            'Osmall' => '0xf76f',
            'Psmall' => '0xf770',
            'Qsmall' => '0xf771',
            'Rsmall' => '0xf772',
            'Ssmall' => '0xf773',
            'Tsmall' => '0xf774',
            'Usmall' => '0xf775',
            'Vsmall' => '0xf776',
            'Wsmall' => '0xf777',
            'Xsmall' => '0xf778',
            'Ysmall' => '0xf779',
            'Zsmall' => '0xf77a',
            'exclamdownsmall' => '0xf7a1',
            'centoldstyle' => '0xf7a2',
            'Dieresissmall' => '0xf7a8',
            'Macronsmall' => '0xf7af',
            'Acutesmall' => '0xf7b4',
            'Cedillasmall' => '0xf7b8',
            'questiondownsmall' => '0xf7bf',
            'Agravesmall' => '0xf7e0',
            'Aacutesmall' => '0xf7e1',
            'Acircumflexsmall' => '0xf7e2',
            'Atildesmall' => '0xf7e3',
            'Adieresissmall' => '0xf7e4',
            'Aringsmall' => '0xf7e5',
            'AEsmall' => '0xf7e6',
            'Ccedillasmall' => '0xf7e7',
            'Egravesmall' => '0xf7e8',
            'Eacutesmall' => '0xf7e9',
            'Ecircumflexsmall' => '0xf7ea',
            'Edieresissmall' => '0xf7eb',
            'Igravesmall' => '0xf7ec',
            'Iacutesmall' => '0xf7ed',
            'Icircumflexsmall' => '0xf7ee',
            'Idieresissmall' => '0xf7ef',
            'Ethsmall' => '0xf7f0',
            'Ntildesmall' => '0xf7f1',
            'Ogravesmall' => '0xf7f2',
            'Oacutesmall' => '0xf7f3',
            'Ocircumflexsmall' => '0xf7f4',
            'Otildesmall' => '0xf7f5',
            'Odieresissmall' => '0xf7f6',
            'Oslashsmall' => '0xf7f8',
            'Ugravesmall' => '0xf7f9',
            'Uacutesmall' => '0xf7fa',
            'Ucircumflexsmall' => '0xf7fb',
            'Udieresissmall' => '0xf7fc',
            'Yacutesmall' => '0xf7fd',
            'Thornsmall' => '0xf7fe',
            'Ydieresissmall' => '0xf7ff',
            'radicalex' => '0xf8e5',
            'arrowvertex' => '0xf8e6',
            'arrowhorizex' => '0xf8e7',
            'registersans' => '0xf8e8',
            'copyrightsans' => '0xf8e9',
            'trademarksans' => '0xf8ea',
            'parenlefttp' => '0xf8eb',
            'parenleftex' => '0xf8ec',
            'parenleftbt' => '0xf8ed',
            'bracketlefttp' => '0xf8ee',
            'bracketleftex' => '0xf8ef',
            'bracketleftbt' => '0xf8f0',
            'bracelefttp' => '0xf8f1',
            'braceleftmid' => '0xf8f2',
            'braceleftbt' => '0xf8f3',
            'braceex' => '0xf8f4',
            'integralex' => '0xf8f5',
            'parenrighttp' => '0xf8f6',
            'parenrightex' => '0xf8f7',
            'parenrightbt' => '0xf8f8',
            'bracketrighttp' => '0xf8f9',
            'bracketrightex' => '0xf8fa',
            'bracketrightbt' => '0xf8fb',
            'bracerighttp' => '0xf8fc',
            'bracerightmid' => '0xf8fd',
            'bracerightbt' => '0xf8fe',
            'ff' => '0xfb00',
            'fi' => '0xfb01',
            'fl' => '0xfb02',
            'ffi' => '0xfb03',
            'ffl' => '0xfb04',
            'afii57705' => '0xfb1f',
            'afii57694' => '0xfb2a',
            'afii57695' => '0xfb2b',
            'afii57723' => '0xfb35',
            'afii57700' => '0xfb4b',
        ];
    }

    public static function getCodePoint($glyph): ?int
    {
        $glyphsMap = static::getGlyphs();

        if (isset($glyphsMap[$glyph])) {
            return hexdec($glyphsMap[$glyph]);
        }

        return null;
    }
}
