/*----------1----------------*/
$(function () {
    // Fake data for countries and cities from 2003 to 2013
    var data = {
        "2003": {
            "areas": {
                "AF": {
                    "value": 23811026,
                    "href": "https://en.wikipedia.org/w/index.php?search=Afghanistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Afghanistan</span><br />Population : 23811026"
                    }
                },
                "ZA": {
                    "value": 43635718,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Africa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Africa</span><br />Population : 43635718"
                    }
                },
                "AL": {
                    "value": 28472433,
                    "href": "https://en.wikipedia.org/w/index.php?search=Albania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Albania</span><br />Population : 28472433"
                    }
                },
                "DZ": {
                    "value": 7013507,
                    "href": "https://en.wikipedia.org/w/index.php?search=Algeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Algeria</span><br />Population : 7013507"
                    }
                },
                "DE": {
                    "value": 36848343,
                    "href": "https://en.wikipedia.org/w/index.php?search=Germany",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Germany</span><br />Population : 36848343"
                    }
                },
                "AD": {
                    "value": 30847009,
                    "href": "https://en.wikipedia.org/w/index.php?search=Andorra",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Andorra</span><br />Population : 30847009"
                    }
                },
                "AO": {
                    "value": 971957,
                    "href": "https://en.wikipedia.org/w/index.php?search=Angola",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Angola</span><br />Population : 971957"
                    }
                },
                "AG": {
                    "value": 38155365,
                    "href": "https://en.wikipedia.org/w/index.php?search=Antigua And Barbuda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Antigua And Barbuda</span><br />Population : 38155365"
                    }
                },
                "SA": {
                    "value": 35729605,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saudi Arabia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saudi Arabia</span><br />Population : 35729605"
                    }
                },
                "AR": {
                    "value": 32448340,
                    "href": "https://en.wikipedia.org/w/index.php?search=Argentina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Argentina</span><br />Population : 32448340"
                    }
                },
                "AM": {
                    "value": 44485739,
                    "href": "https://en.wikipedia.org/w/index.php?search=Armenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Armenia</span><br />Population : 44485739"
                    }
                },
                "AU": {
                    "value": 22851324,
                    "href": "https://en.wikipedia.org/w/index.php?search=Australia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Australia</span><br />Population : 22851324"
                    }
                },
                "AT": {
                    "value": 3607937,
                    "href": "https://en.wikipedia.org/w/index.php?search=Austria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Austria</span><br />Population : 3607937"
                    }
                },
                "AZ": {
                    "value": 9130334,
                    "href": "https://en.wikipedia.org/w/index.php?search=Azerbaijan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Azerbaijan</span><br />Population : 9130334"
                    }
                },
                "BS": {
                    "value": 7391903,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahamas",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahamas</span><br />Population : 7391903"
                    }
                },
                "BH": {
                    "value": 26617010,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahrain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahrain</span><br />Population : 26617010"
                    }
                },
                "BD": {
                    "value": 13486465,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bangladesh",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bangladesh</span><br />Population : 13486465"
                    }
                },
                "BB": {
                    "value": 11433618,
                    "href": "https://en.wikipedia.org/w/index.php?search=Barbados",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Barbados</span><br />Population : 11433618"
                    }
                },
                "BE": {
                    "value": 7618576,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belgium",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belgium</span><br />Population : 7618576"
                    }
                },
                "BZ": {
                    "value": 25118048,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belize",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belize</span><br />Population : 25118048"
                    }
                },
                "BJ": {
                    "value": 48518314,
                    "href": "https://en.wikipedia.org/w/index.php?search=Benin",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Benin</span><br />Population : 48518314"
                    }
                },
                "BT": {
                    "value": 59948816,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bhutan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bhutan</span><br />Population : 59948816"
                    }
                },
                "BY": {
                    "value": 13343881,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belarus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belarus</span><br />Population : 13343881"
                    }
                },
                "MM": {
                    "value": 23970062,
                    "href": "https://en.wikipedia.org/w/index.php?search=Myanmar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Myanmar</span><br />Population : 23970062"
                    }
                },
                "BO": {
                    "value": 2006607,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bolivia, Plurinational State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bolivia, Plurinational State Of</span><br />Population : 2006607"
                    }
                },
                "BA": {
                    "value": 25516553,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bosnia And Herzegovina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bosnia And Herzegovina</span><br />Population : 25516553"
                    }
                },
                "BW": {
                    "value": 22695944,
                    "href": "https://en.wikipedia.org/w/index.php?search=Botswana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Botswana</span><br />Population : 22695944"
                    }
                },
                "BR": {
                    "value": 58738678,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brazil",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brazil</span><br />Population : 58738678"
                    }
                },
                "BN": {
                    "value": 36804471,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brunei Darussalam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brunei Darussalam</span><br />Population : 36804471"
                    }
                },
                "BG": {
                    "value": 48527454,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bulgaria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bulgaria</span><br />Population : 48527454"
                    }
                },
                "BF": {
                    "value": 3852890,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burkina Faso",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burkina Faso</span><br />Population : 3852890"
                    }
                },
                "BI": {
                    "value": 15239520,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burundi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burundi</span><br />Population : 15239520"
                    }
                },
                "KH": {
                    "value": 46215030,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cambodia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cambodia</span><br />Population : 46215030"
                    }
                },
                "CM": {
                    "value": 59722144,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cameroon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cameroon</span><br />Population : 59722144"
                    }
                },
                "CA": {
                    "value": 14842843,
                    "href": "https://en.wikipedia.org/w/index.php?search=Canada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Canada</span><br />Population : 14842843"
                    }
                },
                "CV": {
                    "value": 48838214,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cape Verde",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cape Verde</span><br />Population : 48838214"
                    }
                },
                "CF": {
                    "value": 13391409,
                    "href": "https://en.wikipedia.org/w/index.php?search=Central African Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Central African Republic</span><br />Population : 13391409"
                    }
                },
                "CL": {
                    "value": 19791247,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chile",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chile</span><br />Population : 19791247"
                    }
                },
                "CN": {
                    "value": 23843930,
                    "href": "https://en.wikipedia.org/w/index.php?search=China",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">China</span><br />Population : 23843930"
                    }
                },
                "CY": {
                    "value": 45350385,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cyprus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cyprus</span><br />Population : 45350385"
                    }
                },
                "CO": {
                    "value": 11336734,
                    "href": "https://en.wikipedia.org/w/index.php?search=Colombia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Colombia</span><br />Population : 11336734"
                    }
                },
                "KM": {
                    "value": 39175391,
                    "href": "https://en.wikipedia.org/w/index.php?search=Comoros",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Comoros</span><br />Population : 39175391"
                    }
                },
                "CG": {
                    "value": 28984274,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo</span><br />Population : 28984274"
                    }
                },
                "CD": {
                    "value": 40341657,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo, The Democratic Republic Of The",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo, The Democratic Republic Of The</span><br />Population : 40341657"
                    }
                },
                "KP": {
                    "value": 23204129,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Democratic People's Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Democratic People's Republic Of</span><br />Population : 23204129"
                    }
                },
                "KR": {
                    "value": 18665198,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Republic Of</span><br />Population : 18665198"
                    }
                },
                "CR": {
                    "value": 58342002,
                    "href": "https://en.wikipedia.org/w/index.php?search=Costa Rica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Costa Rica</span><br />Population : 58342002"
                    }
                },
                "CI": {
                    "value": 39427655,
                    "href": "https://en.wikipedia.org/w/index.php?search=C\u00d4te D'ivoire",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">C\u00d4te D'ivoire</span><br />Population : 39427655"
                    }
                },
                "HR": {
                    "value": 2196719,
                    "href": "https://en.wikipedia.org/w/index.php?search=Croatia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Croatia</span><br />Population : 2196719"
                    }
                },
                "CU": {
                    "value": 8801294,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cuba",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cuba</span><br />Population : 8801294"
                    }
                },
                "DK": {
                    "value": 50145237,
                    "href": "https://en.wikipedia.org/w/index.php?search=Denmark",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Denmark</span><br />Population : 50145237"
                    }
                },
                "DJ": {
                    "value": 18274005,
                    "href": "https://en.wikipedia.org/w/index.php?search=Djibouti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Djibouti</span><br />Population : 18274005"
                    }
                },
                "DM": {
                    "value": 51267630,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominica</span><br />Population : 51267630"
                    }
                },
                "EG": {
                    "value": 30174304,
                    "href": "https://en.wikipedia.org/w/index.php?search=Egypt",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Egypt</span><br />Population : 30174304"
                    }
                },
                "AE": {
                    "value": 32472104,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Arab Emirates",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Arab Emirates</span><br />Population : 32472104"
                    }
                },
                "EC": {
                    "value": 42396332,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ecuador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ecuador</span><br />Population : 42396332"
                    }
                },
                "ER": {
                    "value": 3819986,
                    "href": "https://en.wikipedia.org/w/index.php?search=Eritrea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Eritrea</span><br />Population : 3819986"
                    }
                },
                "ES": {
                    "value": 13524853,
                    "href": "https://en.wikipedia.org/w/index.php?search=Spain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Spain</span><br />Population : 13524853"
                    }
                },
                "EE": {
                    "value": 3450729,
                    "href": "https://en.wikipedia.org/w/index.php?search=Estonia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Estonia</span><br />Population : 3450729"
                    }
                },
                "US": {
                    "value": 27560260,
                    "href": "https://en.wikipedia.org/w/index.php?search=United States",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United States</span><br />Population : 27560260"
                    }
                },
                "ET": {
                    "value": 22706912,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ethiopia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ethiopia</span><br />Population : 22706912"
                    }
                },
                "FJ": {
                    "value": 39343567,
                    "href": "https://en.wikipedia.org/w/index.php?search=Fiji",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Fiji</span><br />Population : 39343567"
                    }
                },
                "FI": {
                    "value": 51059238,
                    "href": "https://en.wikipedia.org/w/index.php?search=Finland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Finland</span><br />Population : 51059238"
                    }
                },
                "FR": {
                    "value": 39281415,
                    "href": "https://en.wikipedia.org/w/index.php?search=France",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">France</span><br />Population : 39281415"
                    }
                },
                "GA": {
                    "value": 1231533,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gabon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gabon</span><br />Population : 1231533"
                    }
                },
                "GM": {
                    "value": 38371069,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gambia</span><br />Population : 38371069"
                    }
                },
                "GE": {
                    "value": 53625754,
                    "href": "https://en.wikipedia.org/w/index.php?search=Georgia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Georgia</span><br />Population : 53625754"
                    }
                },
                "GH": {
                    "value": 53225422,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ghana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ghana</span><br />Population : 53225422"
                    }
                },
                "GR": {
                    "value": 42346976,
                    "href": "https://en.wikipedia.org/w/index.php?search=Greece",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Greece</span><br />Population : 42346976"
                    }
                },
                "GD": {
                    "value": 31197986,
                    "href": "https://en.wikipedia.org/w/index.php?search=Grenada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Grenada</span><br />Population : 31197986"
                    }
                },
                "GT": {
                    "value": 39228403,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guatemala",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guatemala</span><br />Population : 39228403"
                    }
                },
                "GN": {
                    "value": 15107904,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea</span><br />Population : 15107904"
                    }
                },
                "GQ": {
                    "value": 39356363,
                    "href": "https://en.wikipedia.org/w/index.php?search=Equatorial Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Equatorial Guinea</span><br />Population : 39356363"
                    }
                },
                "GW": {
                    "value": 8464941,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea-bissau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea-bissau</span><br />Population : 8464941"
                    }
                },
                "GY": {
                    "value": 5995309,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guyana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guyana</span><br />Population : 5995309"
                    }
                },
                "HT": {
                    "value": 20394488,
                    "href": "https://en.wikipedia.org/w/index.php?search=Haiti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Haiti</span><br />Population : 20394488"
                    }
                },
                "HN": {
                    "value": 35312821,
                    "href": "https://en.wikipedia.org/w/index.php?search=Honduras",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Honduras</span><br />Population : 35312821"
                    }
                },
                "HU": {
                    "value": 50662561,
                    "href": "https://en.wikipedia.org/w/index.php?search=Hungary",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Hungary</span><br />Population : 50662561"
                    }
                },
                "JM": {
                    "value": 41904599,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jamaica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jamaica</span><br />Population : 41904599"
                    }
                },
                "JP": {
                    "value": 14800799,
                    "href": "https://en.wikipedia.org/w/index.php?search=Japan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Japan</span><br />Population : 14800799"
                    }
                },
                "MH": {
                    "value": 43319473,
                    "href": "https://en.wikipedia.org/w/index.php?search=Marshall Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Marshall Islands</span><br />Population : 43319473"
                    }
                },
                "PW": {
                    "value": 28631470,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palau</span><br />Population : 28631470"
                    }
                },
                "SB": {
                    "value": 25284396,
                    "href": "https://en.wikipedia.org/w/index.php?search=Solomon Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Solomon Islands</span><br />Population : 25284396"
                    }
                },
                "IN": {
                    "value": 33892462,
                    "href": "https://en.wikipedia.org/w/index.php?search=India",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">India</span><br />Population : 33892462"
                    }
                },
                "ID": {
                    "value": 46529447,
                    "href": "https://en.wikipedia.org/w/index.php?search=Indonesia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Indonesia</span><br />Population : 46529447"
                    }
                },
                "JO": {
                    "value": 22862292,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jordan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jordan</span><br />Population : 22862292"
                    }
                },
                "IR": {
                    "value": 44112827,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iran, Islamic Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iran, Islamic Republic Of</span><br />Population : 44112827"
                    }
                },
                "IQ": {
                    "value": 23385101,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iraq",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iraq</span><br />Population : 23385101"
                    }
                },
                "IE": {
                    "value": 58045865,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ireland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ireland</span><br />Population : 58045865"
                    }
                },
                "IS": {
                    "value": 23995654,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iceland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iceland</span><br />Population : 23995654"
                    }
                },
                "IL": {
                    "value": 36618015,
                    "href": "https://en.wikipedia.org/w/index.php?search=Israel",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Israel</span><br />Population : 36618015"
                    }
                },
                "IT": {
                    "value": 18844342,
                    "href": "https://en.wikipedia.org/w/index.php?search=Italy",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Italy</span><br />Population : 18844342"
                    }
                },
                "KZ": {
                    "value": 1121853,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kazakhstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kazakhstan</span><br />Population : 1121853"
                    }
                },
                "KE": {
                    "value": 52622181,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kenya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kenya</span><br />Population : 52622181"
                    }
                },
                "KG": {
                    "value": 30878085,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kyrgyzstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kyrgyzstan</span><br />Population : 30878085"
                    }
                },
                "KI": {
                    "value": 25885809,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kiribati",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kiribati</span><br />Population : 25885809"
                    }
                },
                "KW": {
                    "value": 8660537,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kuwait",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kuwait</span><br />Population : 8660537"
                    }
                },
                "LA": {
                    "value": 39482495,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lao People's Democratic Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lao People's Democratic Republic</span><br />Population : 39482495"
                    }
                },
                "LS": {
                    "value": 25021164,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lesotho",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lesotho</span><br />Population : 25021164"
                    }
                },
                "LV": {
                    "value": 20175128,
                    "href": "https://en.wikipedia.org/w/index.php?search=Latvia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Latvia</span><br />Population : 20175128"
                    }
                },
                "LB": {
                    "value": 3915042,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lebanon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lebanon</span><br />Population : 3915042"
                    }
                },
                "LR": {
                    "value": 5167224,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liberia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liberia</span><br />Population : 5167224"
                    }
                },
                "LY": {
                    "value": 47125376,
                    "href": "https://en.wikipedia.org/w/index.php?search=Libya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Libya</span><br />Population : 47125376"
                    }
                },
                "LI": {
                    "value": 7327923,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liechtenstein",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liechtenstein</span><br />Population : 7327923"
                    }
                },
                "LT": {
                    "value": 59888492,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lithuania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lithuania</span><br />Population : 59888492"
                    }
                },
                "LU": {
                    "value": 216992,
                    "href": "https://en.wikipedia.org/w/index.php?search=Luxembourg",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Luxembourg</span><br />Population : 216992"
                    }
                },
                "MK": {
                    "value": 35418845,
                    "href": "https://en.wikipedia.org/w/index.php?search=Macedonia, The Former Yugoslav Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Macedonia, The Former Yugoslav Republic Of</span><br />Population : 35418845"
                    }
                },
                "MG": {
                    "value": 22909820,
                    "href": "https://en.wikipedia.org/w/index.php?search=Madagascar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Madagascar</span><br />Population : 22909820"
                    }
                },
                "MY": {
                    "value": 39934012,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malaysia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malaysia</span><br />Population : 39934012"
                    }
                },
                "MW": {
                    "value": 45222425,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malawi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malawi</span><br />Population : 45222425"
                    }
                },
                "MV": {
                    "value": 17979696,
                    "href": "https://en.wikipedia.org/w/index.php?search=Maldives",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Maldives</span><br />Population : 17979696"
                    }
                },
                "ML": {
                    "value": 12636444,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mali",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mali</span><br />Population : 12636444"
                    }
                },
                "MT": {
                    "value": 17054727,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malta",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malta</span><br />Population : 17054727"
                    }
                },
                "MA": {
                    "value": 11024145,
                    "href": "https://en.wikipedia.org/w/index.php?search=Morocco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Morocco</span><br />Population : 11024145"
                    }
                },
                "MU": {
                    "value": 52836057,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritius",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritius</span><br />Population : 52836057"
                    }
                },
                "MR": {
                    "value": 12073419,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritania</span><br />Population : 12073419"
                    }
                },
                "MX": {
                    "value": 34303763,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mexico",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mexico</span><br />Population : 34303763"
                    }
                },
                "FM": {
                    "value": 38012781,
                    "href": "https://en.wikipedia.org/w/index.php?search=Micronesia, Federated States Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Micronesia, Federated States Of</span><br />Population : 38012781"
                    }
                },
                "MD": {
                    "value": 48266049,
                    "href": "https://en.wikipedia.org/w/index.php?search=Moldova, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Moldova, Republic Of</span><br />Population : 48266049"
                    }
                },
                "MC": {
                    "value": 26836371,
                    "href": "https://en.wikipedia.org/w/index.php?search=Monaco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Monaco</span><br />Population : 26836371"
                    }
                },
                "MN": {
                    "value": 44884244,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mongolia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mongolia</span><br />Population : 44884244"
                    }
                },
                "ME": {
                    "value": 56928956,
                    "href": "https://en.wikipedia.org/w/index.php?search=Montenegro",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Montenegro</span><br />Population : 56928956"
                    }
                },
                "MZ": {
                    "value": 2397799,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mozambique",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mozambique</span><br />Population : 2397799"
                    }
                },
                "NA": {
                    "value": 32590924,
                    "href": "https://en.wikipedia.org/w/index.php?search=Namibia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Namibia</span><br />Population : 32590924"
                    }
                },
                "NP": {
                    "value": 31949295,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nepal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nepal</span><br />Population : 31949295"
                    }
                },
                "NI": {
                    "value": 28463293,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nicaragua",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nicaragua</span><br />Population : 28463293"
                    }
                },
                "NE": {
                    "value": 3209433,
                    "href": "https://en.wikipedia.org/w/index.php?search=Niger",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Niger</span><br />Population : 3209433"
                    }
                },
                "NG": {
                    "value": 34952704,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nigeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nigeria</span><br />Population : 34952704"
                    }
                },
                "NO": {
                    "value": 8602041,
                    "href": "https://en.wikipedia.org/w/index.php?search=Norway",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Norway</span><br />Population : 8602041"
                    }
                },
                "NZ": {
                    "value": 3156420,
                    "href": "https://en.wikipedia.org/w/index.php?search=New Zealand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New Zealand</span><br />Population : 3156420"
                    }
                },
                "OM": {
                    "value": 48829074,
                    "href": "https://en.wikipedia.org/w/index.php?search=Oman",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Oman</span><br />Population : 48829074"
                    }
                },
                "UG": {
                    "value": 9587335,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uganda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uganda</span><br />Population : 9587335"
                    }
                },
                "UZ": {
                    "value": 17895608,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uzbekistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uzbekistan</span><br />Population : 17895608"
                    }
                },
                "PK": {
                    "value": 1598962,
                    "href": "https://en.wikipedia.org/w/index.php?search=Pakistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Pakistan</span><br />Population : 1598962"
                    }
                },
                "PS": {
                    "value": 47534848,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palestine, State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palestine, State Of</span><br />Population : 47534848"
                    }
                },
                "PA": {
                    "value": 22010443,
                    "href": "https://en.wikipedia.org/w/index.php?search=Panama",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Panama</span><br />Population : 22010443"
                    }
                },
                "PG": {
                    "value": 13033120,
                    "href": "https://en.wikipedia.org/w/index.php?search=Papua New Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Papua New Guinea</span><br />Population : 13033120"
                    }
                },
                "PY": {
                    "value": 14431543,
                    "href": "https://en.wikipedia.org/w/index.php?search=Paraguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paraguay</span><br />Population : 14431543"
                    }
                },
                "NL": {
                    "value": 57354880,
                    "href": "https://en.wikipedia.org/w/index.php?search=Netherlands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Netherlands</span><br />Population : 57354880"
                    }
                },
                "PE": {
                    "value": 47887653,
                    "href": "https://en.wikipedia.org/w/index.php?search=Peru",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Peru</span><br />Population : 47887653"
                    }
                },
                "PH": {
                    "value": 37067703,
                    "href": "https://en.wikipedia.org/w/index.php?search=Philippines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Philippines</span><br />Population : 37067703"
                    }
                },
                "PL": {
                    "value": 2344787,
                    "href": "https://en.wikipedia.org/w/index.php?search=Poland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Poland</span><br />Population : 2344787"
                    }
                },
                "PT": {
                    "value": 46467295,
                    "href": "https://en.wikipedia.org/w/index.php?search=Portugal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Portugal</span><br />Population : 46467295"
                    }
                },
                "QA": {
                    "value": 32934589,
                    "href": "https://en.wikipedia.org/w/index.php?search=Qatar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Qatar</span><br />Population : 32934589"
                    }
                },
                "DO": {
                    "value": 43202481,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominican Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominican Republic</span><br />Population : 43202481"
                    }
                },
                "RO": {
                    "value": 15879321,
                    "href": "https://en.wikipedia.org/w/index.php?search=Romania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Romania</span><br />Population : 15879321"
                    }
                },
                "GB": {
                    "value": 13000216,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Kingdom",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Kingdom</span><br />Population : 13000216"
                    }
                },
                "RU": {
                    "value": 12716876,
                    "href": "https://en.wikipedia.org/w/index.php?search=Russian Federation",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Russian Federation</span><br />Population : 12716876"
                    }
                },
                "RW": {
                    "value": 14590579,
                    "href": "https://en.wikipedia.org/w/index.php?search=Rwanda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Rwanda</span><br />Population : 14590579"
                    }
                },
                "KN": {
                    "value": 15725769,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Kitts And Nevis",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Kitts And Nevis</span><br />Population : 15725769"
                    }
                },
                "SM": {
                    "value": 44931772,
                    "href": "https://en.wikipedia.org/w/index.php?search=San Marino",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">San Marino</span><br />Population : 44931772"
                    }
                },
                "VC": {
                    "value": 52750141,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Vincent And The Grenadines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Vincent And The Grenadines</span><br />Population : 52750141"
                    }
                },
                "LC": {
                    "value": 24235123,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Lucia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Lucia</span><br />Population : 24235123"
                    }
                },
                "SV": {
                    "value": 52424756,
                    "href": "https://en.wikipedia.org/w/index.php?search=El Salvador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">El Salvador</span><br />Population : 52424756"
                    }
                },
                "WS": {
                    "value": 20590085,
                    "href": "https://en.wikipedia.org/w/index.php?search=Samoa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Samoa</span><br />Population : 20590085"
                    }
                },
                "ST": {
                    "value": 8900006,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sao Tome And Principe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sao Tome And Principe</span><br />Population : 8900006"
                    }
                },
                "SN": {
                    "value": 55289237,
                    "href": "https://en.wikipedia.org/w/index.php?search=Senegal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Senegal</span><br />Population : 55289237"
                    }
                },
                "RS": {
                    "value": 26766907,
                    "href": "https://en.wikipedia.org/w/index.php?search=Serbia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Serbia</span><br />Population : 26766907"
                    }
                },
                "SC": {
                    "value": 27953281,
                    "href": "https://en.wikipedia.org/w/index.php?search=Seychelles",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Seychelles</span><br />Population : 27953281"
                    }
                },
                "SL": {
                    "value": 6582098,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sierra Leone",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sierra Leone</span><br />Population : 6582098"
                    }
                },
                "SG": {
                    "value": 1056045,
                    "href": "https://en.wikipedia.org/w/index.php?search=Singapore",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Singapore</span><br />Population : 1056045"
                    }
                },
                "SK": {
                    "value": 49192847,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovakia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovakia</span><br />Population : 49192847"
                    }
                },
                "SI": {
                    "value": 5249484,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovenia</span><br />Population : 5249484"
                    }
                },
                "SO": {
                    "value": 21462042,
                    "href": "https://en.wikipedia.org/w/index.php?search=Somalia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Somalia</span><br />Population : 21462042"
                    }
                },
                "SD": {
                    "value": 24388675,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sudan</span><br />Population : 24388675"
                    }
                },
                "SS": {
                    "value": 20493201,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Sudan</span><br />Population : 20493201"
                    }
                },
                "LK": {
                    "value": 40456821,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sri Lanka",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sri Lanka</span><br />Population : 40456821"
                    }
                },
                "SE": {
                    "value": 59155463,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sweden",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sweden</span><br />Population : 59155463"
                    }
                },
                "CH": {
                    "value": 18590249,
                    "href": "https://en.wikipedia.org/w/index.php?search=Switzerland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Switzerland</span><br />Population : 18590249"
                    }
                },
                "SR": {
                    "value": 51108594,
                    "href": "https://en.wikipedia.org/w/index.php?search=Suriname",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Suriname</span><br />Population : 51108594"
                    }
                },
                "SZ": {
                    "value": 11903415,
                    "href": "https://en.wikipedia.org/w/index.php?search=Swaziland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Swaziland</span><br />Population : 11903415"
                    }
                },
                "SY": {
                    "value": 35427985,
                    "href": "https://en.wikipedia.org/w/index.php?search=Syrian Arab Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Syrian Arab Republic</span><br />Population : 35427985"
                    }
                },
                "TJ": {
                    "value": 26713895,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tajikistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tajikistan</span><br />Population : 26713895"
                    }
                },
                "TZ": {
                    "value": 41829651,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tanzania, United Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tanzania, United Republic Of</span><br />Population : 41829651"
                    }
                },
                "TD": {
                    "value": 7567392,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chad",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chad</span><br />Population : 7567392"
                    }
                },
                "CZ": {
                    "value": 15795233,
                    "href": "https://en.wikipedia.org/w/index.php?search=Czech Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Czech Republic</span><br />Population : 15795233"
                    }
                },
                "TH": {
                    "value": 1962735,
                    "href": "https://en.wikipedia.org/w/index.php?search=Thailand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Thailand</span><br />Population : 1962735"
                    }
                },
                "TL": {
                    "value": 43196997,
                    "href": "https://en.wikipedia.org/w/index.php?search=Timor-leste",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Timor-leste</span><br />Population : 43196997"
                    }
                },
                "TG": {
                    "value": 25576877,
                    "href": "https://en.wikipedia.org/w/index.php?search=Togo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Togo</span><br />Population : 25576877"
                    }
                },
                "TO": {
                    "value": 35822833,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tonga",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tonga</span><br />Population : 35822833"
                    }
                },
                "TT": {
                    "value": 47289896,
                    "href": "https://en.wikipedia.org/w/index.php?search=Trinidad And Tobago",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Trinidad And Tobago</span><br />Population : 47289896"
                    }
                },
                "TN": {
                    "value": 15901257,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tunisia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tunisia</span><br />Population : 15901257"
                    }
                },
                "TM": {
                    "value": 34109995,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkmenistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkmenistan</span><br />Population : 34109995"
                    }
                },
                "TR": {
                    "value": 41226410,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkey",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkey</span><br />Population : 41226410"
                    }
                },
                "TV": {
                    "value": 55998502,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tuvalu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tuvalu</span><br />Population : 55998502"
                    }
                },
                "VU": {
                    "value": 10483056,
                    "href": "https://en.wikipedia.org/w/index.php?search=Vanuatu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Vanuatu</span><br />Population : 10483056"
                    }
                },
                "VE": {
                    "value": 31294870,
                    "href": "https://en.wikipedia.org/w/index.php?search=Venezuela, Bolivarian Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Venezuela, Bolivarian Republic Of</span><br />Population : 31294870"
                    }
                },
                "VN": {
                    "value": 7671588,
                    "href": "https://en.wikipedia.org/w/index.php?search=Viet Nam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Viet Nam</span><br />Population : 7671588"
                    }
                },
                "UA": {
                    "value": 11241678,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ukraine",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ukraine</span><br />Population : 11241678"
                    }
                },
                "UY": {
                    "value": 47533020,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uruguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uruguay</span><br />Population : 47533020"
                    }
                },
                "YE": {
                    "value": 45209629,
                    "href": "https://en.wikipedia.org/w/index.php?search=Yemen",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Yemen</span><br />Population : 45209629"
                    }
                },
                "ZM": {
                    "value": 673992,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zambia</span><br />Population : 673992"
                    }
                },
                "ZW": {
                    "value": 45922550,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zimbabwe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zimbabwe</span><br />Population : 45922550"
                    }
                }
            },
            "plots": {
                "paris": {
                    "value": 1448389,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paris</span><br />Population: 1448389"
                    }
                },
                "newyork": {
                    "value": 426800,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New-York</span><br />Population: 426800"
                    }
                },
                "sydney": {
                    "value": 1401819,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sydney</span><br />Population: 1401819"
                    }
                },
                "brasilia": {
                    "value": 644440,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brasilia</span><br />Population: 644440"
                    }
                },
                "tokyo": {
                    "value": 143237,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tokyo</span><br />Population: 143237"
                    }
                }
            }
        },
        "2004": {
            "areas": {
                "AF": {
                    "value": 25891293,
                    "href": "https://en.wikipedia.org/w/index.php?search=Afghanistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Afghanistan</span><br />Population : 25891293"
                    }
                },
                "ZA": {
                    "value": 58862983,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Africa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Africa</span><br />Population : 58862983"
                    }
                },
                "AL": {
                    "value": 16659878,
                    "href": "https://en.wikipedia.org/w/index.php?search=Albania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Albania</span><br />Population : 16659878"
                    }
                },
                "DZ": {
                    "value": 50348145,
                    "href": "https://en.wikipedia.org/w/index.php?search=Algeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Algeria</span><br />Population : 50348145"
                    }
                },
                "DE": {
                    "value": 18864450,
                    "href": "https://en.wikipedia.org/w/index.php?search=Germany",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Germany</span><br />Population : 18864450"
                    }
                },
                "AD": {
                    "value": 45430817,
                    "href": "https://en.wikipedia.org/w/index.php?search=Andorra",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Andorra</span><br />Population : 45430817"
                    }
                },
                "AO": {
                    "value": 8872586,
                    "href": "https://en.wikipedia.org/w/index.php?search=Angola",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Angola</span><br />Population : 8872586"
                    }
                },
                "AG": {
                    "value": 43877014,
                    "href": "https://en.wikipedia.org/w/index.php?search=Antigua And Barbuda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Antigua And Barbuda</span><br />Population : 43877014"
                    }
                },
                "SA": {
                    "value": 21079989,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saudi Arabia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saudi Arabia</span><br />Population : 21079989"
                    }
                },
                "AR": {
                    "value": 21118378,
                    "href": "https://en.wikipedia.org/w/index.php?search=Argentina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Argentina</span><br />Population : 21118378"
                    }
                },
                "AM": {
                    "value": 13135489,
                    "href": "https://en.wikipedia.org/w/index.php?search=Armenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Armenia</span><br />Population : 13135489"
                    }
                },
                "AU": {
                    "value": 33077173,
                    "href": "https://en.wikipedia.org/w/index.php?search=Australia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Australia</span><br />Population : 33077173"
                    }
                },
                "AT": {
                    "value": 30666037,
                    "href": "https://en.wikipedia.org/w/index.php?search=Austria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Austria</span><br />Population : 30666037"
                    }
                },
                "AZ": {
                    "value": 21491290,
                    "href": "https://en.wikipedia.org/w/index.php?search=Azerbaijan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Azerbaijan</span><br />Population : 21491290"
                    }
                },
                "BS": {
                    "value": 12601712,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahamas",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahamas</span><br />Population : 12601712"
                    }
                },
                "BH": {
                    "value": 38539246,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahrain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahrain</span><br />Population : 38539246"
                    }
                },
                "BD": {
                    "value": 15800717,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bangladesh",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bangladesh</span><br />Population : 15800717"
                    }
                },
                "BB": {
                    "value": 52165180,
                    "href": "https://en.wikipedia.org/w/index.php?search=Barbados",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Barbados</span><br />Population : 52165180"
                    }
                },
                "BE": {
                    "value": 20374380,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belgium",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belgium</span><br />Population : 20374380"
                    }
                },
                "BZ": {
                    "value": 50903858,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belize",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belize</span><br />Population : 50903858"
                    }
                },
                "BJ": {
                    "value": 34512155,
                    "href": "https://en.wikipedia.org/w/index.php?search=Benin",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Benin</span><br />Population : 34512155"
                    }
                },
                "BT": {
                    "value": 28905670,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bhutan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bhutan</span><br />Population : 28905670"
                    }
                },
                "BY": {
                    "value": 19606619,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belarus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belarus</span><br />Population : 19606619"
                    }
                },
                "MM": {
                    "value": 30861633,
                    "href": "https://en.wikipedia.org/w/index.php?search=Myanmar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Myanmar</span><br />Population : 30861633"
                    }
                },
                "BO": {
                    "value": 54978476,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bolivia, Plurinational State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bolivia, Plurinational State Of</span><br />Population : 54978476"
                    }
                },
                "BA": {
                    "value": 17228387,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bosnia And Herzegovina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bosnia And Herzegovina</span><br />Population : 17228387"
                    }
                },
                "BW": {
                    "value": 23401553,
                    "href": "https://en.wikipedia.org/w/index.php?search=Botswana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Botswana</span><br />Population : 23401553"
                    }
                },
                "BR": {
                    "value": 28953198,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brazil",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brazil</span><br />Population : 28953198"
                    }
                },
                "BN": {
                    "value": 15427804,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brunei Darussalam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brunei Darussalam</span><br />Population : 15427804"
                    }
                },
                "BG": {
                    "value": 52698957,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bulgaria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bulgaria</span><br />Population : 52698957"
                    }
                },
                "BF": {
                    "value": 14912307,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burkina Faso",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burkina Faso</span><br />Population : 14912307"
                    }
                },
                "BI": {
                    "value": 5869177,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burundi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burundi</span><br />Population : 5869177"
                    }
                },
                "KH": {
                    "value": 3838266,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cambodia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cambodia</span><br />Population : 3838266"
                    }
                },
                "CM": {
                    "value": 21133002,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cameroon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cameroon</span><br />Population : 21133002"
                    }
                },
                "CA": {
                    "value": 7242007,
                    "href": "https://en.wikipedia.org/w/index.php?search=Canada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Canada</span><br />Population : 7242007"
                    }
                },
                "CV": {
                    "value": 12150195,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cape Verde",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cape Verde</span><br />Population : 12150195"
                    }
                },
                "CF": {
                    "value": 18337985,
                    "href": "https://en.wikipedia.org/w/index.php?search=Central African Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Central African Republic</span><br />Population : 18337985"
                    }
                },
                "CL": {
                    "value": 17996148,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chile",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chile</span><br />Population : 17996148"
                    }
                },
                "CN": {
                    "value": 43443778,
                    "href": "https://en.wikipedia.org/w/index.php?search=China",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">China</span><br />Population : 43443778"
                    }
                },
                "CY": {
                    "value": 8486877,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cyprus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cyprus</span><br />Population : 8486877"
                    }
                },
                "CO": {
                    "value": 27105087,
                    "href": "https://en.wikipedia.org/w/index.php?search=Colombia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Colombia</span><br />Population : 27105087"
                    }
                },
                "KM": {
                    "value": 48904023,
                    "href": "https://en.wikipedia.org/w/index.php?search=Comoros",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Comoros</span><br />Population : 48904023"
                    }
                },
                "CG": {
                    "value": 16820743,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo</span><br />Population : 16820743"
                    }
                },
                "CD": {
                    "value": 45419849,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo, The Democratic Republic Of The",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo, The Democratic Republic Of The</span><br />Population : 45419849"
                    }
                },
                "KP": {
                    "value": 28267697,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Democratic People's Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Democratic People's Republic Of</span><br />Population : 28267697"
                    }
                },
                "KR": {
                    "value": 29622247,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Republic Of</span><br />Population : 29622247"
                    }
                },
                "CR": {
                    "value": 30326028,
                    "href": "https://en.wikipedia.org/w/index.php?search=Costa Rica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Costa Rica</span><br />Population : 30326028"
                    }
                },
                "CI": {
                    "value": 23739734,
                    "href": "https://en.wikipedia.org/w/index.php?search=C\u00d4te D'ivoire",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">C\u00d4te D'ivoire</span><br />Population : 23739734"
                    }
                },
                "HR": {
                    "value": 49903940,
                    "href": "https://en.wikipedia.org/w/index.php?search=Croatia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Croatia</span><br />Population : 49903940"
                    }
                },
                "CU": {
                    "value": 25666449,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cuba",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cuba</span><br />Population : 25666449"
                    }
                },
                "DK": {
                    "value": 37162760,
                    "href": "https://en.wikipedia.org/w/index.php?search=Denmark",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Denmark</span><br />Population : 37162760"
                    }
                },
                "DJ": {
                    "value": 53887159,
                    "href": "https://en.wikipedia.org/w/index.php?search=Djibouti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Djibouti</span><br />Population : 53887159"
                    }
                },
                "DM": {
                    "value": 30241940,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominica</span><br />Population : 30241940"
                    }
                },
                "EG": {
                    "value": 12702252,
                    "href": "https://en.wikipedia.org/w/index.php?search=Egypt",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Egypt</span><br />Population : 12702252"
                    }
                },
                "AE": {
                    "value": 20484061,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Arab Emirates",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Arab Emirates</span><br />Population : 20484061"
                    }
                },
                "EC": {
                    "value": 36652747,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ecuador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ecuador</span><br />Population : 36652747"
                    }
                },
                "ER": {
                    "value": 57259824,
                    "href": "https://en.wikipedia.org/w/index.php?search=Eritrea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Eritrea</span><br />Population : 57259824"
                    }
                },
                "ES": {
                    "value": 56245282,
                    "href": "https://en.wikipedia.org/w/index.php?search=Spain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Spain</span><br />Population : 56245282"
                    }
                },
                "EE": {
                    "value": 53293058,
                    "href": "https://en.wikipedia.org/w/index.php?search=Estonia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Estonia</span><br />Population : 53293058"
                    }
                },
                "US": {
                    "value": 22577124,
                    "href": "https://en.wikipedia.org/w/index.php?search=United States",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United States</span><br />Population : 22577124"
                    }
                },
                "ET": {
                    "value": 9285714,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ethiopia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ethiopia</span><br />Population : 9285714"
                    }
                },
                "FJ": {
                    "value": 12161163,
                    "href": "https://en.wikipedia.org/w/index.php?search=Fiji",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Fiji</span><br />Population : 12161163"
                    }
                },
                "FI": {
                    "value": 58842875,
                    "href": "https://en.wikipedia.org/w/index.php?search=Finland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Finland</span><br />Population : 58842875"
                    }
                },
                "FR": {
                    "value": 32250916,
                    "href": "https://en.wikipedia.org/w/index.php?search=France",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">France</span><br />Population : 32250916"
                    }
                },
                "GA": {
                    "value": 34197739,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gabon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gabon</span><br />Population : 34197739"
                    }
                },
                "GM": {
                    "value": 5865521,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gambia</span><br />Population : 5865521"
                    }
                },
                "GE": {
                    "value": 50236637,
                    "href": "https://en.wikipedia.org/w/index.php?search=Georgia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Georgia</span><br />Population : 50236637"
                    }
                },
                "GH": {
                    "value": 56314747,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ghana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ghana</span><br />Population : 56314747"
                    }
                },
                "GR": {
                    "value": 10324020,
                    "href": "https://en.wikipedia.org/w/index.php?search=Greece",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Greece</span><br />Population : 10324020"
                    }
                },
                "GD": {
                    "value": 13023980,
                    "href": "https://en.wikipedia.org/w/index.php?search=Grenada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Grenada</span><br />Population : 13023980"
                    }
                },
                "GT": {
                    "value": 10627469,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guatemala",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guatemala</span><br />Population : 10627469"
                    }
                },
                "GN": {
                    "value": 55459241,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea</span><br />Population : 55459241"
                    }
                },
                "GQ": {
                    "value": 25642685,
                    "href": "https://en.wikipedia.org/w/index.php?search=Equatorial Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Equatorial Guinea</span><br />Population : 25642685"
                    }
                },
                "GW": {
                    "value": 39252167,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea-bissau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea-bissau</span><br />Population : 39252167"
                    }
                },
                "GY": {
                    "value": 13018496,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guyana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guyana</span><br />Population : 13018496"
                    }
                },
                "HT": {
                    "value": 20325024,
                    "href": "https://en.wikipedia.org/w/index.php?search=Haiti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Haiti</span><br />Population : 20325024"
                    }
                },
                "HN": {
                    "value": 18381857,
                    "href": "https://en.wikipedia.org/w/index.php?search=Honduras",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Honduras</span><br />Population : 18381857"
                    }
                },
                "HU": {
                    "value": 315704,
                    "href": "https://en.wikipedia.org/w/index.php?search=Hungary",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Hungary</span><br />Population : 315704"
                    }
                },
                "JM": {
                    "value": 40562845,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jamaica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jamaica</span><br />Population : 40562845"
                    }
                },
                "JP": {
                    "value": 31402722,
                    "href": "https://en.wikipedia.org/w/index.php?search=Japan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Japan</span><br />Population : 31402722"
                    }
                },
                "MH": {
                    "value": 16619662,
                    "href": "https://en.wikipedia.org/w/index.php?search=Marshall Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Marshall Islands</span><br />Population : 16619662"
                    }
                },
                "PW": {
                    "value": 21630218,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palau</span><br />Population : 21630218"
                    }
                },
                "SB": {
                    "value": 46463639,
                    "href": "https://en.wikipedia.org/w/index.php?search=Solomon Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Solomon Islands</span><br />Population : 46463639"
                    }
                },
                "IN": {
                    "value": 19432959,
                    "href": "https://en.wikipedia.org/w/index.php?search=India",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">India</span><br />Population : 19432959"
                    }
                },
                "ID": {
                    "value": 18484225,
                    "href": "https://en.wikipedia.org/w/index.php?search=Indonesia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Indonesia</span><br />Population : 18484225"
                    }
                },
                "JO": {
                    "value": 18961334,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jordan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jordan</span><br />Population : 18961334"
                    }
                },
                "IR": {
                    "value": 13874002,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iran, Islamic Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iran, Islamic Republic Of</span><br />Population : 13874002"
                    }
                },
                "IQ": {
                    "value": 5006359,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iraq",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iraq</span><br />Population : 5006359"
                    }
                },
                "IE": {
                    "value": 52053672,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ireland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ireland</span><br />Population : 52053672"
                    }
                },
                "IS": {
                    "value": 57824677,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iceland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iceland</span><br />Population : 57824677"
                    }
                },
                "IL": {
                    "value": 15797061,
                    "href": "https://en.wikipedia.org/w/index.php?search=Israel",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Israel</span><br />Population : 15797061"
                    }
                },
                "IT": {
                    "value": 38663550,
                    "href": "https://en.wikipedia.org/w/index.php?search=Italy",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Italy</span><br />Population : 38663550"
                    }
                },
                "KZ": {
                    "value": 55556125,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kazakhstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kazakhstan</span><br />Population : 55556125"
                    }
                },
                "KE": {
                    "value": 53985871,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kenya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kenya</span><br />Population : 53985871"
                    }
                },
                "KG": {
                    "value": 35385941,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kyrgyzstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kyrgyzstan</span><br />Population : 35385941"
                    }
                },
                "KI": {
                    "value": 21195154,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kiribati",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kiribati</span><br />Population : 21195154"
                    }
                },
                "KW": {
                    "value": 57069712,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kuwait",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kuwait</span><br />Population : 57069712"
                    }
                },
                "LA": {
                    "value": 13060540,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lao People's Democratic Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lao People's Democratic Republic</span><br />Population : 13060540"
                    }
                },
                "LS": {
                    "value": 25843765,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lesotho",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lesotho</span><br />Population : 25843765"
                    }
                },
                "LV": {
                    "value": 3141796,
                    "href": "https://en.wikipedia.org/w/index.php?search=Latvia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Latvia</span><br />Population : 3141796"
                    }
                },
                "LB": {
                    "value": 54722556,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lebanon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lebanon</span><br />Population : 54722556"
                    }
                },
                "LR": {
                    "value": 30514313,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liberia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liberia</span><br />Population : 30514313"
                    }
                },
                "LY": {
                    "value": 30223660,
                    "href": "https://en.wikipedia.org/w/index.php?search=Libya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Libya</span><br />Population : 30223660"
                    }
                },
                "LI": {
                    "value": 5094104,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liechtenstein",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liechtenstein</span><br />Population : 5094104"
                    }
                },
                "LT": {
                    "value": 16692782,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lithuania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lithuania</span><br />Population : 16692782"
                    }
                },
                "LU": {
                    "value": 52062812,
                    "href": "https://en.wikipedia.org/w/index.php?search=Luxembourg",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Luxembourg</span><br />Population : 52062812"
                    }
                },
                "MK": {
                    "value": 1728750,
                    "href": "https://en.wikipedia.org/w/index.php?search=Macedonia, The Former Yugoslav Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Macedonia, The Former Yugoslav Republic Of</span><br />Population : 1728750"
                    }
                },
                "MG": {
                    "value": 17692700,
                    "href": "https://en.wikipedia.org/w/index.php?search=Madagascar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Madagascar</span><br />Population : 17692700"
                    }
                },
                "MY": {
                    "value": 1008517,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malaysia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malaysia</span><br />Population : 1008517"
                    }
                },
                "MW": {
                    "value": 53371662,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malawi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malawi</span><br />Population : 53371662"
                    }
                },
                "MV": {
                    "value": 43312161,
                    "href": "https://en.wikipedia.org/w/index.php?search=Maldives",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Maldives</span><br />Population : 43312161"
                    }
                },
                "ML": {
                    "value": 1628210,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mali",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mali</span><br />Population : 1628210"
                    }
                },
                "MT": {
                    "value": 35747885,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malta",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malta</span><br />Population : 35747885"
                    }
                },
                "MA": {
                    "value": 40056488,
                    "href": "https://en.wikipedia.org/w/index.php?search=Morocco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Morocco</span><br />Population : 40056488"
                    }
                },
                "MU": {
                    "value": 48277018,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritius",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritius</span><br />Population : 48277018"
                    }
                },
                "MR": {
                    "value": 7441259,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritania</span><br />Population : 7441259"
                    }
                },
                "MX": {
                    "value": 59139011,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mexico",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mexico</span><br />Population : 59139011"
                    }
                },
                "FM": {
                    "value": 47682917,
                    "href": "https://en.wikipedia.org/w/index.php?search=Micronesia, Federated States Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Micronesia, Federated States Of</span><br />Population : 47682917"
                    }
                },
                "MD": {
                    "value": 59676444,
                    "href": "https://en.wikipedia.org/w/index.php?search=Moldova, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Moldova, Republic Of</span><br />Population : 59676444"
                    }
                },
                "MC": {
                    "value": 55722474,
                    "href": "https://en.wikipedia.org/w/index.php?search=Monaco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Monaco</span><br />Population : 55722474"
                    }
                },
                "MN": {
                    "value": 39360019,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mongolia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mongolia</span><br />Population : 39360019"
                    }
                },
                "ME": {
                    "value": 21966571,
                    "href": "https://en.wikipedia.org/w/index.php?search=Montenegro",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Montenegro</span><br />Population : 21966571"
                    }
                },
                "MZ": {
                    "value": 30713565,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mozambique",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mozambique</span><br />Population : 30713565"
                    }
                },
                "NA": {
                    "value": 17312475,
                    "href": "https://en.wikipedia.org/w/index.php?search=Namibia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Namibia</span><br />Population : 17312475"
                    }
                },
                "NP": {
                    "value": 34439035,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nepal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nepal</span><br />Population : 34439035"
                    }
                },
                "NI": {
                    "value": 58373078,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nicaragua",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nicaragua</span><br />Population : 58373078"
                    }
                },
                "NE": {
                    "value": 4441507,
                    "href": "https://en.wikipedia.org/w/index.php?search=Niger",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Niger</span><br />Population : 4441507"
                    }
                },
                "NG": {
                    "value": 32601892,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nigeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nigeria</span><br />Population : 32601892"
                    }
                },
                "NO": {
                    "value": 12554184,
                    "href": "https://en.wikipedia.org/w/index.php?search=Norway",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Norway</span><br />Population : 12554184"
                    }
                },
                "NZ": {
                    "value": 42718061,
                    "href": "https://en.wikipedia.org/w/index.php?search=New Zealand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New Zealand</span><br />Population : 42718061"
                    }
                },
                "OM": {
                    "value": 53863395,
                    "href": "https://en.wikipedia.org/w/index.php?search=Oman",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Oman</span><br />Population : 53863395"
                    }
                },
                "UG": {
                    "value": 32331348,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uganda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uganda</span><br />Population : 32331348"
                    }
                },
                "UZ": {
                    "value": 31733591,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uzbekistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uzbekistan</span><br />Population : 31733591"
                    }
                },
                "PK": {
                    "value": 10567144,
                    "href": "https://en.wikipedia.org/w/index.php?search=Pakistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Pakistan</span><br />Population : 10567144"
                    }
                },
                "PS": {
                    "value": 42332352,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palestine, State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palestine, State Of</span><br />Population : 42332352"
                    }
                },
                "PA": {
                    "value": 37091467,
                    "href": "https://en.wikipedia.org/w/index.php?search=Panama",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Panama</span><br />Population : 37091467"
                    }
                },
                "PG": {
                    "value": 255380,
                    "href": "https://en.wikipedia.org/w/index.php?search=Papua New Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Papua New Guinea</span><br />Population : 255380"
                    }
                },
                "PY": {
                    "value": 27435956,
                    "href": "https://en.wikipedia.org/w/index.php?search=Paraguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paraguay</span><br />Population : 27435956"
                    }
                },
                "NL": {
                    "value": 42851505,
                    "href": "https://en.wikipedia.org/w/index.php?search=Netherlands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Netherlands</span><br />Population : 42851505"
                    }
                },
                "PE": {
                    "value": 37522876,
                    "href": "https://en.wikipedia.org/w/index.php?search=Peru",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Peru</span><br />Population : 37522876"
                    }
                },
                "PH": {
                    "value": 36047678,
                    "href": "https://en.wikipedia.org/w/index.php?search=Philippines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Philippines</span><br />Population : 36047678"
                    }
                },
                "PL": {
                    "value": 9090118,
                    "href": "https://en.wikipedia.org/w/index.php?search=Poland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Poland</span><br />Population : 9090118"
                    }
                },
                "PT": {
                    "value": 38573978,
                    "href": "https://en.wikipedia.org/w/index.php?search=Portugal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Portugal</span><br />Population : 38573978"
                    }
                },
                "QA": {
                    "value": 54216199,
                    "href": "https://en.wikipedia.org/w/index.php?search=Qatar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Qatar</span><br />Population : 54216199"
                    }
                },
                "DO": {
                    "value": 47388608,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominican Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominican Republic</span><br />Population : 47388608"
                    }
                },
                "RO": {
                    "value": 21045257,
                    "href": "https://en.wikipedia.org/w/index.php?search=Romania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Romania</span><br />Population : 21045257"
                    }
                },
                "GB": {
                    "value": 42602896,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Kingdom",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Kingdom</span><br />Population : 42602896"
                    }
                },
                "RU": {
                    "value": 17912060,
                    "href": "https://en.wikipedia.org/w/index.php?search=Russian Federation",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Russian Federation</span><br />Population : 17912060"
                    }
                },
                "RW": {
                    "value": 32406296,
                    "href": "https://en.wikipedia.org/w/index.php?search=Rwanda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Rwanda</span><br />Population : 32406296"
                    }
                },
                "KN": {
                    "value": 38966998,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Kitts And Nevis",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Kitts And Nevis</span><br />Population : 38966998"
                    }
                },
                "SM": {
                    "value": 38091385,
                    "href": "https://en.wikipedia.org/w/index.php?search=San Marino",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">San Marino</span><br />Population : 38091385"
                    }
                },
                "VC": {
                    "value": 9101086,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Vincent And The Grenadines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Vincent And The Grenadines</span><br />Population : 9101086"
                    }
                },
                "LC": {
                    "value": 19178866,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Lucia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Lucia</span><br />Population : 19178866"
                    }
                },
                "SV": {
                    "value": 8570965,
                    "href": "https://en.wikipedia.org/w/index.php?search=El Salvador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">El Salvador</span><br />Population : 8570965"
                    }
                },
                "WS": {
                    "value": 38142569,
                    "href": "https://en.wikipedia.org/w/index.php?search=Samoa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Samoa</span><br />Population : 38142569"
                    }
                },
                "ST": {
                    "value": 18423901,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sao Tome And Principe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sao Tome And Principe</span><br />Population : 18423901"
                    }
                },
                "SN": {
                    "value": 5834445,
                    "href": "https://en.wikipedia.org/w/index.php?search=Senegal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Senegal</span><br />Population : 5834445"
                    }
                },
                "RS": {
                    "value": 25322784,
                    "href": "https://en.wikipedia.org/w/index.php?search=Serbia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Serbia</span><br />Population : 25322784"
                    }
                },
                "SC": {
                    "value": 25909573,
                    "href": "https://en.wikipedia.org/w/index.php?search=Seychelles",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Seychelles</span><br />Population : 25909573"
                    }
                },
                "SL": {
                    "value": 6571130,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sierra Leone",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sierra Leone</span><br />Population : 6571130"
                    }
                },
                "SG": {
                    "value": 20451156,
                    "href": "https://en.wikipedia.org/w/index.php?search=Singapore",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Singapore</span><br />Population : 20451156"
                    }
                },
                "SK": {
                    "value": 34938080,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovakia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovakia</span><br />Population : 34938080"
                    }
                },
                "SI": {
                    "value": 14495523,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovenia</span><br />Population : 14495523"
                    }
                },
                "SO": {
                    "value": 24083398,
                    "href": "https://en.wikipedia.org/w/index.php?search=Somalia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Somalia</span><br />Population : 24083398"
                    }
                },
                "SD": {
                    "value": 1257125,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sudan</span><br />Population : 1257125"
                    }
                },
                "SS": {
                    "value": 13082477,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Sudan</span><br />Population : 13082477"
                    }
                },
                "LK": {
                    "value": 46953543,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sri Lanka",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sri Lanka</span><br />Population : 46953543"
                    }
                },
                "SE": {
                    "value": 31651331,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sweden",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sweden</span><br />Population : 31651331"
                    }
                },
                "CH": {
                    "value": 36230478,
                    "href": "https://en.wikipedia.org/w/index.php?search=Switzerland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Switzerland</span><br />Population : 36230478"
                    }
                },
                "SR": {
                    "value": 25271600,
                    "href": "https://en.wikipedia.org/w/index.php?search=Suriname",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Suriname</span><br />Population : 25271600"
                    }
                },
                "SZ": {
                    "value": 16586758,
                    "href": "https://en.wikipedia.org/w/index.php?search=Swaziland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Swaziland</span><br />Population : 16586758"
                    }
                },
                "SY": {
                    "value": 19915552,
                    "href": "https://en.wikipedia.org/w/index.php?search=Syrian Arab Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Syrian Arab Republic</span><br />Population : 19915552"
                    }
                },
                "TJ": {
                    "value": 3699337,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tajikistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tajikistan</span><br />Population : 3699337"
                    }
                },
                "TZ": {
                    "value": 47171076,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tanzania, United Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tanzania, United Republic Of</span><br />Population : 47171076"
                    }
                },
                "TD": {
                    "value": 26348294,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chad",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chad</span><br />Population : 26348294"
                    }
                },
                "CZ": {
                    "value": 9466687,
                    "href": "https://en.wikipedia.org/w/index.php?search=Czech Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Czech Republic</span><br />Population : 9466687"
                    }
                },
                "TH": {
                    "value": 51541831,
                    "href": "https://en.wikipedia.org/w/index.php?search=Thailand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Thailand</span><br />Population : 51541831"
                    }
                },
                "TL": {
                    "value": 24496527,
                    "href": "https://en.wikipedia.org/w/index.php?search=Timor-leste",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Timor-leste</span><br />Population : 24496527"
                    }
                },
                "TG": {
                    "value": 29441275,
                    "href": "https://en.wikipedia.org/w/index.php?search=Togo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Togo</span><br />Population : 29441275"
                    }
                },
                "TO": {
                    "value": 50845362,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tonga",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tonga</span><br />Population : 50845362"
                    }
                },
                "TT": {
                    "value": 58086081,
                    "href": "https://en.wikipedia.org/w/index.php?search=Trinidad And Tobago",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Trinidad And Tobago</span><br />Population : 58086081"
                    }
                },
                "TN": {
                    "value": 52713581,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tunisia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tunisia</span><br />Population : 52713581"
                    }
                },
                "TM": {
                    "value": 9018826,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkmenistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkmenistan</span><br />Population : 9018826"
                    }
                },
                "TR": {
                    "value": 44842200,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkey",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkey</span><br />Population : 44842200"
                    }
                },
                "TV": {
                    "value": 51410215,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tuvalu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tuvalu</span><br />Population : 51410215"
                    }
                },
                "VU": {
                    "value": 17637860,
                    "href": "https://en.wikipedia.org/w/index.php?search=Vanuatu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Vanuatu</span><br />Population : 17637860"
                    }
                },
                "VE": {
                    "value": 38084073,
                    "href": "https://en.wikipedia.org/w/index.php?search=Venezuela, Bolivarian Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Venezuela, Bolivarian Republic Of</span><br />Population : 38084073"
                    }
                },
                "VN": {
                    "value": 41997827,
                    "href": "https://en.wikipedia.org/w/index.php?search=Viet Nam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Viet Nam</span><br />Population : 41997827"
                    }
                },
                "UA": {
                    "value": 29642355,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ukraine",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ukraine</span><br />Population : 29642355"
                    }
                },
                "UY": {
                    "value": 14734991,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uruguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uruguay</span><br />Population : 14734991"
                    }
                },
                "YE": {
                    "value": 39890140,
                    "href": "https://en.wikipedia.org/w/index.php?search=Yemen",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Yemen</span><br />Population : 39890140"
                    }
                },
                "ZM": {
                    "value": 3002868,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zambia</span><br />Population : 3002868"
                    }
                },
                "ZW": {
                    "value": 20860629,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zimbabwe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zimbabwe</span><br />Population : 20860629"
                    }
                }
            },
            "plots": {
                "paris": {
                    "value": 1257410,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paris</span><br />Population: 1257410"
                    }
                },
                "newyork": {
                    "value": 741339,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New-York</span><br />Population: 741339"
                    }
                },
                "sydney": {
                    "value": 992774,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sydney</span><br />Population: 992774"
                    }
                },
                "brasilia": {
                    "value": 639740,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brasilia</span><br />Population: 639740"
                    }
                },
                "tokyo": {
                    "value": 987219,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tokyo</span><br />Population: 987219"
                    }
                }
            }
        },
        "2005": {
            "areas": {
                "AF": {
                    "value": 44087235,
                    "href": "https://en.wikipedia.org/w/index.php?search=Afghanistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Afghanistan</span><br />Population : 44087235"
                    }
                },
                "ZA": {
                    "value": 48673694,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Africa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Africa</span><br />Population : 48673694"
                    }
                },
                "AL": {
                    "value": 4818075,
                    "href": "https://en.wikipedia.org/w/index.php?search=Albania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Albania</span><br />Population : 4818075"
                    }
                },
                "DZ": {
                    "value": 45569745,
                    "href": "https://en.wikipedia.org/w/index.php?search=Algeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Algeria</span><br />Population : 45569745"
                    }
                },
                "DE": {
                    "value": 42734513,
                    "href": "https://en.wikipedia.org/w/index.php?search=Germany",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Germany</span><br />Population : 42734513"
                    }
                },
                "AD": {
                    "value": 24770727,
                    "href": "https://en.wikipedia.org/w/index.php?search=Andorra",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Andorra</span><br />Population : 24770727"
                    }
                },
                "AO": {
                    "value": 23763498,
                    "href": "https://en.wikipedia.org/w/index.php?search=Angola",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Angola</span><br />Population : 23763498"
                    }
                },
                "AG": {
                    "value": 47814533,
                    "href": "https://en.wikipedia.org/w/index.php?search=Antigua And Barbuda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Antigua And Barbuda</span><br />Population : 47814533"
                    }
                },
                "SA": {
                    "value": 6635110,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saudi Arabia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saudi Arabia</span><br />Population : 6635110"
                    }
                },
                "AR": {
                    "value": 47079676,
                    "href": "https://en.wikipedia.org/w/index.php?search=Argentina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Argentina</span><br />Population : 47079676"
                    }
                },
                "AM": {
                    "value": 48207553,
                    "href": "https://en.wikipedia.org/w/index.php?search=Armenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Armenia</span><br />Population : 48207553"
                    }
                },
                "AU": {
                    "value": 50410297,
                    "href": "https://en.wikipedia.org/w/index.php?search=Australia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Australia</span><br />Population : 50410297"
                    }
                },
                "AT": {
                    "value": 8792154,
                    "href": "https://en.wikipedia.org/w/index.php?search=Austria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Austria</span><br />Population : 8792154"
                    }
                },
                "AZ": {
                    "value": 46341162,
                    "href": "https://en.wikipedia.org/w/index.php?search=Azerbaijan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Azerbaijan</span><br />Population : 46341162"
                    }
                },
                "BS": {
                    "value": 16378366,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahamas",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahamas</span><br />Population : 16378366"
                    }
                },
                "BH": {
                    "value": 29022662,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahrain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahrain</span><br />Population : 29022662"
                    }
                },
                "BD": {
                    "value": 32358768,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bangladesh",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bangladesh</span><br />Population : 32358768"
                    }
                },
                "BB": {
                    "value": 43145813,
                    "href": "https://en.wikipedia.org/w/index.php?search=Barbados",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Barbados</span><br />Population : 43145813"
                    }
                },
                "BE": {
                    "value": 16254062,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belgium",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belgium</span><br />Population : 16254062"
                    }
                },
                "BZ": {
                    "value": 49167255,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belize",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belize</span><br />Population : 49167255"
                    }
                },
                "BJ": {
                    "value": 30538077,
                    "href": "https://en.wikipedia.org/w/index.php?search=Benin",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Benin</span><br />Population : 30538077"
                    }
                },
                "BT": {
                    "value": 28134253,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bhutan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bhutan</span><br />Population : 28134253"
                    }
                },
                "BY": {
                    "value": 45962766,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belarus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belarus</span><br />Population : 45962766"
                    }
                },
                "MM": {
                    "value": 26609698,
                    "href": "https://en.wikipedia.org/w/index.php?search=Myanmar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Myanmar</span><br />Population : 26609698"
                    }
                },
                "BO": {
                    "value": 46383206,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bolivia, Plurinational State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bolivia, Plurinational State Of</span><br />Population : 46383206"
                    }
                },
                "BA": {
                    "value": 21897107,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bosnia And Herzegovina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bosnia And Herzegovina</span><br />Population : 21897107"
                    }
                },
                "BW": {
                    "value": 13782602,
                    "href": "https://en.wikipedia.org/w/index.php?search=Botswana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Botswana</span><br />Population : 13782602"
                    }
                },
                "BR": {
                    "value": 26865619,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brazil",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brazil</span><br />Population : 26865619"
                    }
                },
                "BN": {
                    "value": 33097281,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brunei Darussalam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brunei Darussalam</span><br />Population : 33097281"
                    }
                },
                "BG": {
                    "value": 15075000,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bulgaria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bulgaria</span><br />Population : 15075000"
                    }
                },
                "BF": {
                    "value": 37641696,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burkina Faso",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burkina Faso</span><br />Population : 37641696"
                    }
                },
                "BI": {
                    "value": 25600641,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burundi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burundi</span><br />Population : 25600641"
                    }
                },
                "KH": {
                    "value": 33733426,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cambodia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cambodia</span><br />Population : 33733426"
                    }
                },
                "CM": {
                    "value": 28258557,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cameroon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cameroon</span><br />Population : 28258557"
                    }
                },
                "CA": {
                    "value": 25818173,
                    "href": "https://en.wikipedia.org/w/index.php?search=Canada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Canada</span><br />Population : 25818173"
                    }
                },
                "CV": {
                    "value": 28430389,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cape Verde",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cape Verde</span><br />Population : 28430389"
                    }
                },
                "CF": {
                    "value": 1494766,
                    "href": "https://en.wikipedia.org/w/index.php?search=Central African Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Central African Republic</span><br />Population : 1494766"
                    }
                },
                "CL": {
                    "value": 52088404,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chile",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chile</span><br />Population : 52088404"
                    }
                },
                "CN": {
                    "value": 36340158,
                    "href": "https://en.wikipedia.org/w/index.php?search=China",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">China</span><br />Population : 36340158"
                    }
                },
                "CY": {
                    "value": 11020489,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cyprus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cyprus</span><br />Population : 11020489"
                    }
                },
                "CO": {
                    "value": 39334427,
                    "href": "https://en.wikipedia.org/w/index.php?search=Colombia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Colombia</span><br />Population : 39334427"
                    }
                },
                "KM": {
                    "value": 47255164,
                    "href": "https://en.wikipedia.org/w/index.php?search=Comoros",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Comoros</span><br />Population : 47255164"
                    }
                },
                "CG": {
                    "value": 37385776,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo</span><br />Population : 37385776"
                    }
                },
                "CD": {
                    "value": 38886566,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo, The Democratic Republic Of The",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo, The Democratic Republic Of The</span><br />Population : 38886566"
                    }
                },
                "KP": {
                    "value": 40555533,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Democratic People's Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Democratic People's Republic Of</span><br />Population : 40555533"
                    }
                },
                "KR": {
                    "value": 4399462,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Republic Of</span><br />Population : 4399462"
                    }
                },
                "CR": {
                    "value": 27083151,
                    "href": "https://en.wikipedia.org/w/index.php?search=Costa Rica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Costa Rica</span><br />Population : 27083151"
                    }
                },
                "CI": {
                    "value": 27794244,
                    "href": "https://en.wikipedia.org/w/index.php?search=C\u00d4te D'ivoire",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">C\u00d4te D'ivoire</span><br />Population : 27794244"
                    }
                },
                "HR": {
                    "value": 48211209,
                    "href": "https://en.wikipedia.org/w/index.php?search=Croatia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Croatia</span><br />Population : 48211209"
                    }
                },
                "CU": {
                    "value": 4011926,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cuba",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cuba</span><br />Population : 4011926"
                    }
                },
                "DK": {
                    "value": 33510410,
                    "href": "https://en.wikipedia.org/w/index.php?search=Denmark",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Denmark</span><br />Population : 33510410"
                    }
                },
                "DJ": {
                    "value": 43259149,
                    "href": "https://en.wikipedia.org/w/index.php?search=Djibouti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Djibouti</span><br />Population : 43259149"
                    }
                },
                "DM": {
                    "value": 15504580,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominica</span><br />Population : 15504580"
                    }
                },
                "EG": {
                    "value": 36733179,
                    "href": "https://en.wikipedia.org/w/index.php?search=Egypt",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Egypt</span><br />Population : 36733179"
                    }
                },
                "AE": {
                    "value": 54795676,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Arab Emirates",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Arab Emirates</span><br />Population : 54795676"
                    }
                },
                "EC": {
                    "value": 1046905,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ecuador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ecuador</span><br />Population : 1046905"
                    }
                },
                "ER": {
                    "value": 45388773,
                    "href": "https://en.wikipedia.org/w/index.php?search=Eritrea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Eritrea</span><br />Population : 45388773"
                    }
                },
                "ES": {
                    "value": 3353845,
                    "href": "https://en.wikipedia.org/w/index.php?search=Spain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Spain</span><br />Population : 3353845"
                    }
                },
                "EE": {
                    "value": 59117075,
                    "href": "https://en.wikipedia.org/w/index.php?search=Estonia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Estonia</span><br />Population : 59117075"
                    }
                },
                "US": {
                    "value": 26573138,
                    "href": "https://en.wikipedia.org/w/index.php?search=United States",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United States</span><br />Population : 26573138"
                    }
                },
                "ET": {
                    "value": 31166910,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ethiopia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ethiopia</span><br />Population : 31166910"
                    }
                },
                "FJ": {
                    "value": 14314551,
                    "href": "https://en.wikipedia.org/w/index.php?search=Fiji",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Fiji</span><br />Population : 14314551"
                    }
                },
                "FI": {
                    "value": 44602732,
                    "href": "https://en.wikipedia.org/w/index.php?search=Finland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Finland</span><br />Population : 44602732"
                    }
                },
                "FR": {
                    "value": 35603473,
                    "href": "https://en.wikipedia.org/w/index.php?search=France",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">France</span><br />Population : 35603473"
                    }
                },
                "GA": {
                    "value": 15892117,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gabon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gabon</span><br />Population : 15892117"
                    }
                },
                "GM": {
                    "value": 30305920,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gambia</span><br />Population : 30305920"
                    }
                },
                "GE": {
                    "value": 39330771,
                    "href": "https://en.wikipedia.org/w/index.php?search=Georgia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Georgia</span><br />Population : 39330771"
                    }
                },
                "GH": {
                    "value": 33753534,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ghana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ghana</span><br />Population : 33753534"
                    }
                },
                "GR": {
                    "value": 12667520,
                    "href": "https://en.wikipedia.org/w/index.php?search=Greece",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Greece</span><br />Population : 12667520"
                    }
                },
                "GD": {
                    "value": 41968579,
                    "href": "https://en.wikipedia.org/w/index.php?search=Grenada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Grenada</span><br />Population : 41968579"
                    }
                },
                "GT": {
                    "value": 41429318,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guatemala",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guatemala</span><br />Population : 41429318"
                    }
                },
                "GN": {
                    "value": 56588947,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea</span><br />Population : 56588947"
                    }
                },
                "GQ": {
                    "value": 4646243,
                    "href": "https://en.wikipedia.org/w/index.php?search=Equatorial Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Equatorial Guinea</span><br />Population : 4646243"
                    }
                },
                "GW": {
                    "value": 9993152,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea-bissau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea-bissau</span><br />Population : 9993152"
                    }
                },
                "GY": {
                    "value": 19076498,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guyana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guyana</span><br />Population : 19076498"
                    }
                },
                "HT": {
                    "value": 49825336,
                    "href": "https://en.wikipedia.org/w/index.php?search=Haiti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Haiti</span><br />Population : 49825336"
                    }
                },
                "HN": {
                    "value": 4931411,
                    "href": "https://en.wikipedia.org/w/index.php?search=Honduras",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Honduras</span><br />Population : 4931411"
                    }
                },
                "HU": {
                    "value": 44820264,
                    "href": "https://en.wikipedia.org/w/index.php?search=Hungary",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Hungary</span><br />Population : 44820264"
                    }
                },
                "JM": {
                    "value": 30300436,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jamaica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jamaica</span><br />Population : 30300436"
                    }
                },
                "JP": {
                    "value": 49028327,
                    "href": "https://en.wikipedia.org/w/index.php?search=Japan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Japan</span><br />Population : 49028327"
                    }
                },
                "MH": {
                    "value": 56576151,
                    "href": "https://en.wikipedia.org/w/index.php?search=Marshall Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Marshall Islands</span><br />Population : 56576151"
                    }
                },
                "PW": {
                    "value": 47240540,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palau</span><br />Population : 47240540"
                    }
                },
                "SB": {
                    "value": 43279257,
                    "href": "https://en.wikipedia.org/w/index.php?search=Solomon Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Solomon Islands</span><br />Population : 43279257"
                    }
                },
                "IN": {
                    "value": 59813544,
                    "href": "https://en.wikipedia.org/w/index.php?search=India",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">India</span><br />Population : 59813544"
                    }
                },
                "ID": {
                    "value": 52883585,
                    "href": "https://en.wikipedia.org/w/index.php?search=Indonesia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Indonesia</span><br />Population : 52883585"
                    }
                },
                "JO": {
                    "value": 7894604,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jordan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jordan</span><br />Population : 7894604"
                    }
                },
                "IR": {
                    "value": 56141086,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iran, Islamic Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iran, Islamic Republic Of</span><br />Population : 56141086"
                    }
                },
                "IQ": {
                    "value": 57846613,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iraq",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iraq</span><br />Population : 57846613"
                    }
                },
                "IE": {
                    "value": 36906839,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ireland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ireland</span><br />Population : 36906839"
                    }
                },
                "IS": {
                    "value": 7273083,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iceland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iceland</span><br />Population : 7273083"
                    }
                },
                "IL": {
                    "value": 37064047,
                    "href": "https://en.wikipedia.org/w/index.php?search=Israel",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Israel</span><br />Population : 37064047"
                    }
                },
                "IT": {
                    "value": 48743158,
                    "href": "https://en.wikipedia.org/w/index.php?search=Italy",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Italy</span><br />Population : 48743158"
                    }
                },
                "KZ": {
                    "value": 21749039,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kazakhstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kazakhstan</span><br />Population : 21749039"
                    }
                },
                "KE": {
                    "value": 36016602,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kenya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kenya</span><br />Population : 36016602"
                    }
                },
                "KG": {
                    "value": 44076267,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kyrgyzstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kyrgyzstan</span><br />Population : 44076267"
                    }
                },
                "KI": {
                    "value": 8168805,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kiribati",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kiribati</span><br />Population : 8168805"
                    }
                },
                "KW": {
                    "value": 50463309,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kuwait",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kuwait</span><br />Population : 50463309"
                    }
                },
                "LA": {
                    "value": 54815784,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lao People's Democratic Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lao People's Democratic Republic</span><br />Population : 54815784"
                    }
                },
                "LS": {
                    "value": 45355869,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lesotho",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lesotho</span><br />Population : 45355869"
                    }
                },
                "LV": {
                    "value": 1639178,
                    "href": "https://en.wikipedia.org/w/index.php?search=Latvia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Latvia</span><br />Population : 1639178"
                    }
                },
                "LB": {
                    "value": 16352774,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lebanon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lebanon</span><br />Population : 16352774"
                    }
                },
                "LR": {
                    "value": 54311255,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liberia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liberia</span><br />Population : 54311255"
                    }
                },
                "LY": {
                    "value": 39030979,
                    "href": "https://en.wikipedia.org/w/index.php?search=Libya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Libya</span><br />Population : 39030979"
                    }
                },
                "LI": {
                    "value": 4819903,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liechtenstein",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liechtenstein</span><br />Population : 4819903"
                    }
                },
                "LT": {
                    "value": 22370560,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lithuania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lithuania</span><br />Population : 22370560"
                    }
                },
                "LU": {
                    "value": 55093641,
                    "href": "https://en.wikipedia.org/w/index.php?search=Luxembourg",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Luxembourg</span><br />Population : 55093641"
                    }
                },
                "MK": {
                    "value": 53179721,
                    "href": "https://en.wikipedia.org/w/index.php?search=Macedonia, The Former Yugoslav Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Macedonia, The Former Yugoslav Republic Of</span><br />Population : 53179721"
                    }
                },
                "MG": {
                    "value": 23326605,
                    "href": "https://en.wikipedia.org/w/index.php?search=Madagascar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Madagascar</span><br />Population : 23326605"
                    }
                },
                "MY": {
                    "value": 21719791,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malaysia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malaysia</span><br />Population : 21719791"
                    }
                },
                "MW": {
                    "value": 47803565,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malawi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malawi</span><br />Population : 47803565"
                    }
                },
                "MV": {
                    "value": 26030221,
                    "href": "https://en.wikipedia.org/w/index.php?search=Maldives",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Maldives</span><br />Population : 26030221"
                    }
                },
                "ML": {
                    "value": 32824908,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mali",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mali</span><br />Population : 32824908"
                    }
                },
                "MT": {
                    "value": 57453592,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malta",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malta</span><br />Population : 57453592"
                    }
                },
                "MA": {
                    "value": 53031653,
                    "href": "https://en.wikipedia.org/w/index.php?search=Morocco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Morocco</span><br />Population : 53031653"
                    }
                },
                "MU": {
                    "value": 45560605,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritius",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritius</span><br />Population : 45560605"
                    }
                },
                "MR": {
                    "value": 38930438,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritania</span><br />Population : 38930438"
                    }
                },
                "MX": {
                    "value": 22875088,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mexico",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mexico</span><br />Population : 22875088"
                    }
                },
                "FM": {
                    "value": 1518530,
                    "href": "https://en.wikipedia.org/w/index.php?search=Micronesia, Federated States Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Micronesia, Federated States Of</span><br />Population : 1518530"
                    }
                },
                "MD": {
                    "value": 49998996,
                    "href": "https://en.wikipedia.org/w/index.php?search=Moldova, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Moldova, Republic Of</span><br />Population : 49998996"
                    }
                },
                "MC": {
                    "value": 17308819,
                    "href": "https://en.wikipedia.org/w/index.php?search=Monaco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Monaco</span><br />Population : 17308819"
                    }
                },
                "MN": {
                    "value": 20937405,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mongolia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mongolia</span><br />Population : 20937405"
                    }
                },
                "ME": {
                    "value": 33654822,
                    "href": "https://en.wikipedia.org/w/index.php?search=Montenegro",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Montenegro</span><br />Population : 33654822"
                    }
                },
                "MZ": {
                    "value": 7523520,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mozambique",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mozambique</span><br />Population : 7523520"
                    }
                },
                "NA": {
                    "value": 33475678,
                    "href": "https://en.wikipedia.org/w/index.php?search=Namibia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Namibia</span><br />Population : 33475678"
                    }
                },
                "NP": {
                    "value": 4843667,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nepal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nepal</span><br />Population : 4843667"
                    }
                },
                "NI": {
                    "value": 20281152,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nicaragua",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nicaragua</span><br />Population : 20281152"
                    }
                },
                "NE": {
                    "value": 36062302,
                    "href": "https://en.wikipedia.org/w/index.php?search=Niger",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Niger</span><br />Population : 36062302"
                    }
                },
                "NG": {
                    "value": 3196637,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nigeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nigeria</span><br />Population : 3196637"
                    }
                },
                "NO": {
                    "value": 17647000,
                    "href": "https://en.wikipedia.org/w/index.php?search=Norway",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Norway</span><br />Population : 17647000"
                    }
                },
                "NZ": {
                    "value": 41888147,
                    "href": "https://en.wikipedia.org/w/index.php?search=New Zealand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New Zealand</span><br />Population : 41888147"
                    }
                },
                "OM": {
                    "value": 43893466,
                    "href": "https://en.wikipedia.org/w/index.php?search=Oman",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Oman</span><br />Population : 43893466"
                    }
                },
                "UG": {
                    "value": 51887323,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uganda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uganda</span><br />Population : 51887323"
                    }
                },
                "UZ": {
                    "value": 12550528,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uzbekistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uzbekistan</span><br />Population : 12550528"
                    }
                },
                "PK": {
                    "value": 29216431,
                    "href": "https://en.wikipedia.org/w/index.php?search=Pakistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Pakistan</span><br />Population : 29216431"
                    }
                },
                "PS": {
                    "value": 29145139,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palestine, State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palestine, State Of</span><br />Population : 29145139"
                    }
                },
                "PA": {
                    "value": 35413361,
                    "href": "https://en.wikipedia.org/w/index.php?search=Panama",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Panama</span><br />Population : 35413361"
                    }
                },
                "PG": {
                    "value": 32607376,
                    "href": "https://en.wikipedia.org/w/index.php?search=Papua New Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Papua New Guinea</span><br />Population : 32607376"
                    }
                },
                "PY": {
                    "value": 2856628,
                    "href": "https://en.wikipedia.org/w/index.php?search=Paraguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paraguay</span><br />Population : 2856628"
                    }
                },
                "NL": {
                    "value": 19895444,
                    "href": "https://en.wikipedia.org/w/index.php?search=Netherlands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Netherlands</span><br />Population : 19895444"
                    }
                },
                "PE": {
                    "value": 19290375,
                    "href": "https://en.wikipedia.org/w/index.php?search=Peru",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Peru</span><br />Population : 19290375"
                    }
                },
                "PH": {
                    "value": 31020670,
                    "href": "https://en.wikipedia.org/w/index.php?search=Philippines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Philippines</span><br />Population : 31020670"
                    }
                },
                "PL": {
                    "value": 13349365,
                    "href": "https://en.wikipedia.org/w/index.php?search=Poland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Poland</span><br />Population : 13349365"
                    }
                },
                "PT": {
                    "value": 14272506,
                    "href": "https://en.wikipedia.org/w/index.php?search=Portugal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Portugal</span><br />Population : 14272506"
                    }
                },
                "QA": {
                    "value": 39083991,
                    "href": "https://en.wikipedia.org/w/index.php?search=Qatar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Qatar</span><br />Population : 39083991"
                    }
                },
                "DO": {
                    "value": 50843534,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominican Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominican Republic</span><br />Population : 50843534"
                    }
                },
                "RO": {
                    "value": 21385266,
                    "href": "https://en.wikipedia.org/w/index.php?search=Romania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Romania</span><br />Population : 21385266"
                    }
                },
                "GB": {
                    "value": 40354453,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Kingdom",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Kingdom</span><br />Population : 40354453"
                    }
                },
                "RU": {
                    "value": 40509833,
                    "href": "https://en.wikipedia.org/w/index.php?search=Russian Federation",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Russian Federation</span><br />Population : 40509833"
                    }
                },
                "RW": {
                    "value": 45279093,
                    "href": "https://en.wikipedia.org/w/index.php?search=Rwanda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Rwanda</span><br />Population : 45279093"
                    }
                },
                "KN": {
                    "value": 17604956,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Kitts And Nevis",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Kitts And Nevis</span><br />Population : 17604956"
                    }
                },
                "SM": {
                    "value": 36369406,
                    "href": "https://en.wikipedia.org/w/index.php?search=San Marino",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">San Marino</span><br />Population : 36369406"
                    }
                },
                "VC": {
                    "value": 59133527,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Vincent And The Grenadines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Vincent And The Grenadines</span><br />Population : 59133527"
                    }
                },
                "LC": {
                    "value": 57380472,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Lucia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Lucia</span><br />Population : 57380472"
                    }
                },
                "SV": {
                    "value": 22599060,
                    "href": "https://en.wikipedia.org/w/index.php?search=El Salvador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">El Salvador</span><br />Population : 22599060"
                    }
                },
                "WS": {
                    "value": 30395493,
                    "href": "https://en.wikipedia.org/w/index.php?search=Samoa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Samoa</span><br />Population : 30395493"
                    }
                },
                "ST": {
                    "value": 40670697,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sao Tome And Principe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sao Tome And Principe</span><br />Population : 40670697"
                    }
                },
                "SN": {
                    "value": 40350797,
                    "href": "https://en.wikipedia.org/w/index.php?search=Senegal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Senegal</span><br />Population : 40350797"
                    }
                },
                "RS": {
                    "value": 27008203,
                    "href": "https://en.wikipedia.org/w/index.php?search=Serbia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Serbia</span><br />Population : 27008203"
                    }
                },
                "SC": {
                    "value": 20560837,
                    "href": "https://en.wikipedia.org/w/index.php?search=Seychelles",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Seychelles</span><br />Population : 20560837"
                    }
                },
                "SL": {
                    "value": 20686969,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sierra Leone",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sierra Leone</span><br />Population : 20686969"
                    }
                },
                "SG": {
                    "value": 37243192,
                    "href": "https://en.wikipedia.org/w/index.php?search=Singapore",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Singapore</span><br />Population : 37243192"
                    }
                },
                "SK": {
                    "value": 51423011,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovakia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovakia</span><br />Population : 51423011"
                    }
                },
                "SI": {
                    "value": 34943564,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovenia</span><br />Population : 34943564"
                    }
                },
                "SO": {
                    "value": 4797967,
                    "href": "https://en.wikipedia.org/w/index.php?search=Somalia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Somalia</span><br />Population : 4797967"
                    }
                },
                "SD": {
                    "value": 1260781,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sudan</span><br />Population : 1260781"
                    }
                },
                "SS": {
                    "value": 26584106,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Sudan</span><br />Population : 26584106"
                    }
                },
                "LK": {
                    "value": 11771798,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sri Lanka",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sri Lanka</span><br />Population : 11771798"
                    }
                },
                "SE": {
                    "value": 28569318,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sweden",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sweden</span><br />Population : 28569318"
                    }
                },
                "CH": {
                    "value": 35356693,
                    "href": "https://en.wikipedia.org/w/index.php?search=Switzerland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Switzerland</span><br />Population : 35356693"
                    }
                },
                "SR": {
                    "value": 32982117,
                    "href": "https://en.wikipedia.org/w/index.php?search=Suriname",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Suriname</span><br />Population : 32982117"
                    }
                },
                "SZ": {
                    "value": 39023667,
                    "href": "https://en.wikipedia.org/w/index.php?search=Swaziland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Swaziland</span><br />Population : 39023667"
                    }
                },
                "SY": {
                    "value": 37716644,
                    "href": "https://en.wikipedia.org/w/index.php?search=Syrian Arab Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Syrian Arab Republic</span><br />Population : 37716644"
                    }
                },
                "TJ": {
                    "value": 32834049,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tajikistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tajikistan</span><br />Population : 32834049"
                    }
                },
                "TZ": {
                    "value": 1357666,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tanzania, United Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tanzania, United Republic Of</span><br />Population : 1357666"
                    }
                },
                "TD": {
                    "value": 54927292,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chad",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chad</span><br />Population : 54927292"
                    }
                },
                "CZ": {
                    "value": 7905572,
                    "href": "https://en.wikipedia.org/w/index.php?search=Czech Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Czech Republic</span><br />Population : 7905572"
                    }
                },
                "TH": {
                    "value": 36745975,
                    "href": "https://en.wikipedia.org/w/index.php?search=Thailand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Thailand</span><br />Population : 36745975"
                    }
                },
                "TL": {
                    "value": 12201379,
                    "href": "https://en.wikipedia.org/w/index.php?search=Timor-leste",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Timor-leste</span><br />Population : 12201379"
                    }
                },
                "TG": {
                    "value": 27660800,
                    "href": "https://en.wikipedia.org/w/index.php?search=Togo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Togo</span><br />Population : 27660800"
                    }
                },
                "TO": {
                    "value": 4651727,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tonga",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tonga</span><br />Population : 4651727"
                    }
                },
                "TT": {
                    "value": 295596,
                    "href": "https://en.wikipedia.org/w/index.php?search=Trinidad And Tobago",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Trinidad And Tobago</span><br />Population : 295596"
                    }
                },
                "TN": {
                    "value": 56153882,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tunisia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tunisia</span><br />Population : 56153882"
                    }
                },
                "TM": {
                    "value": 15252316,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkmenistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkmenistan</span><br />Population : 15252316"
                    }
                },
                "TR": {
                    "value": 3620733,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkey",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkey</span><br />Population : 3620733"
                    }
                },
                "TV": {
                    "value": 26436038,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tuvalu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tuvalu</span><br />Population : 26436038"
                    }
                },
                "VU": {
                    "value": 34005798,
                    "href": "https://en.wikipedia.org/w/index.php?search=Vanuatu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Vanuatu</span><br />Population : 34005798"
                    }
                },
                "VE": {
                    "value": 45779965,
                    "href": "https://en.wikipedia.org/w/index.php?search=Venezuela, Bolivarian Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Venezuela, Bolivarian Republic Of</span><br />Population : 45779965"
                    }
                },
                "VN": {
                    "value": 10428216,
                    "href": "https://en.wikipedia.org/w/index.php?search=Viet Nam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Viet Nam</span><br />Population : 10428216"
                    }
                },
                "UA": {
                    "value": 8470425,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ukraine",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ukraine</span><br />Population : 8470425"
                    }
                },
                "UY": {
                    "value": 56197754,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uruguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uruguay</span><br />Population : 56197754"
                    }
                },
                "YE": {
                    "value": 57471872,
                    "href": "https://en.wikipedia.org/w/index.php?search=Yemen",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Yemen</span><br />Population : 57471872"
                    }
                },
                "ZM": {
                    "value": 739801,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zambia</span><br />Population : 739801"
                    }
                },
                "ZW": {
                    "value": 49351883,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zimbabwe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zimbabwe</span><br />Population : 49351883"
                    }
                }
            },
            "plots": {
                "paris": {
                    "value": 647388,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paris</span><br />Population: 647388"
                    }
                },
                "newyork": {
                    "value": 530194,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New-York</span><br />Population: 530194"
                    }
                },
                "sydney": {
                    "value": 1034216,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sydney</span><br />Population: 1034216"
                    }
                },
                "brasilia": {
                    "value": 1088263,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brasilia</span><br />Population: 1088263"
                    }
                },
                "tokyo": {
                    "value": 1182471,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tokyo</span><br />Population: 1182471"
                    }
                }
            }
        },
        "2006": {
            "areas": {
                "AF": {
                    "value": 46810959,
                    "href": "https://en.wikipedia.org/w/index.php?search=Afghanistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Afghanistan</span><br />Population : 46810959"
                    }
                },
                "ZA": {
                    "value": 44187775,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Africa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Africa</span><br />Population : 44187775"
                    }
                },
                "AL": {
                    "value": 30618509,
                    "href": "https://en.wikipedia.org/w/index.php?search=Albania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Albania</span><br />Population : 30618509"
                    }
                },
                "DZ": {
                    "value": 25670105,
                    "href": "https://en.wikipedia.org/w/index.php?search=Algeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Algeria</span><br />Population : 25670105"
                    }
                },
                "DE": {
                    "value": 50664389,
                    "href": "https://en.wikipedia.org/w/index.php?search=Germany",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Germany</span><br />Population : 50664389"
                    }
                },
                "AD": {
                    "value": 18705414,
                    "href": "https://en.wikipedia.org/w/index.php?search=Andorra",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Andorra</span><br />Population : 18705414"
                    }
                },
                "AO": {
                    "value": 27159927,
                    "href": "https://en.wikipedia.org/w/index.php?search=Angola",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Angola</span><br />Population : 27159927"
                    }
                },
                "AG": {
                    "value": 11828466,
                    "href": "https://en.wikipedia.org/w/index.php?search=Antigua And Barbuda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Antigua And Barbuda</span><br />Population : 11828466"
                    }
                },
                "SA": {
                    "value": 28194577,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saudi Arabia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saudi Arabia</span><br />Population : 28194577"
                    }
                },
                "AR": {
                    "value": 59089655,
                    "href": "https://en.wikipedia.org/w/index.php?search=Argentina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Argentina</span><br />Population : 59089655"
                    }
                },
                "AM": {
                    "value": 15160916,
                    "href": "https://en.wikipedia.org/w/index.php?search=Armenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Armenia</span><br />Population : 15160916"
                    }
                },
                "AU": {
                    "value": 25479993,
                    "href": "https://en.wikipedia.org/w/index.php?search=Australia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Australia</span><br />Population : 25479993"
                    }
                },
                "AT": {
                    "value": 7479647,
                    "href": "https://en.wikipedia.org/w/index.php?search=Austria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Austria</span><br />Population : 7479647"
                    }
                },
                "AZ": {
                    "value": 51156122,
                    "href": "https://en.wikipedia.org/w/index.php?search=Azerbaijan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Azerbaijan</span><br />Population : 51156122"
                    }
                },
                "BS": {
                    "value": 7724600,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahamas",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahamas</span><br />Population : 7724600"
                    }
                },
                "BH": {
                    "value": 57265308,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahrain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahrain</span><br />Population : 57265308"
                    }
                },
                "BD": {
                    "value": 46547727,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bangladesh",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bangladesh</span><br />Population : 46547727"
                    }
                },
                "BB": {
                    "value": 30470441,
                    "href": "https://en.wikipedia.org/w/index.php?search=Barbados",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Barbados</span><br />Population : 30470441"
                    }
                },
                "BE": {
                    "value": 47904105,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belgium",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belgium</span><br />Population : 47904105"
                    }
                },
                "BZ": {
                    "value": 7975036,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belize",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belize</span><br />Population : 7975036"
                    }
                },
                "BJ": {
                    "value": 53676938,
                    "href": "https://en.wikipedia.org/w/index.php?search=Benin",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Benin</span><br />Population : 53676938"
                    }
                },
                "BT": {
                    "value": 2648236,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bhutan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bhutan</span><br />Population : 2648236"
                    }
                },
                "BY": {
                    "value": 29002554,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belarus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belarus</span><br />Population : 29002554"
                    }
                },
                "MM": {
                    "value": 47949805,
                    "href": "https://en.wikipedia.org/w/index.php?search=Myanmar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Myanmar</span><br />Population : 47949805"
                    }
                },
                "BO": {
                    "value": 26995407,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bolivia, Plurinational State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bolivia, Plurinational State Of</span><br />Population : 26995407"
                    }
                },
                "BA": {
                    "value": 3255133,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bosnia And Herzegovina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bosnia And Herzegovina</span><br />Population : 3255133"
                    }
                },
                "BW": {
                    "value": 53973075,
                    "href": "https://en.wikipedia.org/w/index.php?search=Botswana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Botswana</span><br />Population : 53973075"
                    }
                },
                "BR": {
                    "value": 18080237,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brazil",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brazil</span><br />Population : 18080237"
                    }
                },
                "BN": {
                    "value": 54481260,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brunei Darussalam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brunei Darussalam</span><br />Population : 54481260"
                    }
                },
                "BG": {
                    "value": 37906757,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bulgaria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bulgaria</span><br />Population : 37906757"
                    }
                },
                "BF": {
                    "value": 16118789,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burkina Faso",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burkina Faso</span><br />Population : 16118789"
                    }
                },
                "BI": {
                    "value": 28806958,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burundi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burundi</span><br />Population : 28806958"
                    }
                },
                "KH": {
                    "value": 14462619,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cambodia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cambodia</span><br />Population : 14462619"
                    }
                },
                "CM": {
                    "value": 22368732,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cameroon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cameroon</span><br />Population : 22368732"
                    }
                },
                "CA": {
                    "value": 18392825,
                    "href": "https://en.wikipedia.org/w/index.php?search=Canada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Canada</span><br />Population : 18392825"
                    }
                },
                "CV": {
                    "value": 40820593,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cape Verde",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cape Verde</span><br />Population : 40820593"
                    }
                },
                "CF": {
                    "value": 54817612,
                    "href": "https://en.wikipedia.org/w/index.php?search=Central African Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Central African Republic</span><br />Population : 54817612"
                    }
                },
                "CL": {
                    "value": 22156683,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chile",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chile</span><br />Population : 22156683"
                    }
                },
                "CN": {
                    "value": 13998306,
                    "href": "https://en.wikipedia.org/w/index.php?search=China",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">China</span><br />Population : 13998306"
                    }
                },
                "CY": {
                    "value": 44761768,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cyprus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cyprus</span><br />Population : 44761768"
                    }
                },
                "CO": {
                    "value": 53874363,
                    "href": "https://en.wikipedia.org/w/index.php?search=Colombia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Colombia</span><br />Population : 53874363"
                    }
                },
                "KM": {
                    "value": 12936236,
                    "href": "https://en.wikipedia.org/w/index.php?search=Comoros",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Comoros</span><br />Population : 12936236"
                    }
                },
                "CG": {
                    "value": 45988358,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo</span><br />Population : 45988358"
                    }
                },
                "CD": {
                    "value": 1321105,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo, The Democratic Republic Of The",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo, The Democratic Republic Of The</span><br />Population : 1321105"
                    }
                },
                "KP": {
                    "value": 39710996,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Democratic People's Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Democratic People's Republic Of</span><br />Population : 39710996"
                    }
                },
                "KR": {
                    "value": 323016,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Republic Of</span><br />Population : 323016"
                    }
                },
                "CR": {
                    "value": 7666104,
                    "href": "https://en.wikipedia.org/w/index.php?search=Costa Rica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Costa Rica</span><br />Population : 7666104"
                    }
                },
                "CI": {
                    "value": 20939233,
                    "href": "https://en.wikipedia.org/w/index.php?search=C\u00d4te D'ivoire",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">C\u00d4te D'ivoire</span><br />Population : 20939233"
                    }
                },
                "HR": {
                    "value": 10455636,
                    "href": "https://en.wikipedia.org/w/index.php?search=Croatia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Croatia</span><br />Population : 10455636"
                    }
                },
                "CU": {
                    "value": 19882648,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cuba",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cuba</span><br />Population : 19882648"
                    }
                },
                "DK": {
                    "value": 1984671,
                    "href": "https://en.wikipedia.org/w/index.php?search=Denmark",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Denmark</span><br />Population : 1984671"
                    }
                },
                "DJ": {
                    "value": 4406774,
                    "href": "https://en.wikipedia.org/w/index.php?search=Djibouti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Djibouti</span><br />Population : 4406774"
                    }
                },
                "DM": {
                    "value": 54086411,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominica</span><br />Population : 54086411"
                    }
                },
                "EG": {
                    "value": 17330755,
                    "href": "https://en.wikipedia.org/w/index.php?search=Egypt",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Egypt</span><br />Population : 17330755"
                    }
                },
                "AE": {
                    "value": 42047183,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Arab Emirates",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Arab Emirates</span><br />Population : 42047183"
                    }
                },
                "EC": {
                    "value": 2264355,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ecuador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ecuador</span><br />Population : 2264355"
                    }
                },
                "ER": {
                    "value": 48931443,
                    "href": "https://en.wikipedia.org/w/index.php?search=Eritrea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Eritrea</span><br />Population : 48931443"
                    }
                },
                "ES": {
                    "value": 28232965,
                    "href": "https://en.wikipedia.org/w/index.php?search=Spain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Spain</span><br />Population : 28232965"
                    }
                },
                "EE": {
                    "value": 51106766,
                    "href": "https://en.wikipedia.org/w/index.php?search=Estonia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Estonia</span><br />Population : 51106766"
                    }
                },
                "US": {
                    "value": 35102600,
                    "href": "https://en.wikipedia.org/w/index.php?search=United States",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United States</span><br />Population : 35102600"
                    }
                },
                "ET": {
                    "value": 23068857,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ethiopia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ethiopia</span><br />Population : 23068857"
                    }
                },
                "FJ": {
                    "value": 58204902,
                    "href": "https://en.wikipedia.org/w/index.php?search=Fiji",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Fiji</span><br />Population : 58204902"
                    }
                },
                "FI": {
                    "value": 42266544,
                    "href": "https://en.wikipedia.org/w/index.php?search=Finland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Finland</span><br />Population : 42266544"
                    }
                },
                "FR": {
                    "value": 33662134,
                    "href": "https://en.wikipedia.org/w/index.php?search=France",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">France</span><br />Population : 33662134"
                    }
                },
                "GA": {
                    "value": 34526779,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gabon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gabon</span><br />Population : 34526779"
                    }
                },
                "GM": {
                    "value": 23012189,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gambia</span><br />Population : 23012189"
                    }
                },
                "GE": {
                    "value": 58579642,
                    "href": "https://en.wikipedia.org/w/index.php?search=Georgia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Georgia</span><br />Population : 58579642"
                    }
                },
                "GH": {
                    "value": 18533581,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ghana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ghana</span><br />Population : 18533581"
                    }
                },
                "GR": {
                    "value": 51483335,
                    "href": "https://en.wikipedia.org/w/index.php?search=Greece",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Greece</span><br />Population : 51483335"
                    }
                },
                "GD": {
                    "value": 48070453,
                    "href": "https://en.wikipedia.org/w/index.php?search=Grenada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Grenada</span><br />Population : 48070453"
                    }
                },
                "GT": {
                    "value": 53249186,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guatemala",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guatemala</span><br />Population : 53249186"
                    }
                },
                "GN": {
                    "value": 40257569,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea</span><br />Population : 40257569"
                    }
                },
                "GQ": {
                    "value": 12166647,
                    "href": "https://en.wikipedia.org/w/index.php?search=Equatorial Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Equatorial Guinea</span><br />Population : 12166647"
                    }
                },
                "GW": {
                    "value": 49145319,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea-bissau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea-bissau</span><br />Population : 49145319"
                    }
                },
                "GY": {
                    "value": 9428299,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guyana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guyana</span><br />Population : 9428299"
                    }
                },
                "HT": {
                    "value": 59524720,
                    "href": "https://en.wikipedia.org/w/index.php?search=Haiti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Haiti</span><br />Population : 59524720"
                    }
                },
                "HN": {
                    "value": 4554843,
                    "href": "https://en.wikipedia.org/w/index.php?search=Honduras",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Honduras</span><br />Population : 4554843"
                    }
                },
                "HU": {
                    "value": 31852411,
                    "href": "https://en.wikipedia.org/w/index.php?search=Hungary",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Hungary</span><br />Population : 31852411"
                    }
                },
                "JM": {
                    "value": 120108,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jamaica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jamaica</span><br />Population : 120108"
                    }
                },
                "JP": {
                    "value": 7075659,
                    "href": "https://en.wikipedia.org/w/index.php?search=Japan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Japan</span><br />Population : 7075659"
                    }
                },
                "MH": {
                    "value": 26776047,
                    "href": "https://en.wikipedia.org/w/index.php?search=Marshall Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Marshall Islands</span><br />Population : 26776047"
                    }
                },
                "PW": {
                    "value": 31757355,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palau</span><br />Population : 31757355"
                    }
                },
                "SB": {
                    "value": 8477737,
                    "href": "https://en.wikipedia.org/w/index.php?search=Solomon Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Solomon Islands</span><br />Population : 8477737"
                    }
                },
                "IN": {
                    "value": 23301013,
                    "href": "https://en.wikipedia.org/w/index.php?search=India",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">India</span><br />Population : 23301013"
                    }
                },
                "ID": {
                    "value": 47008383,
                    "href": "https://en.wikipedia.org/w/index.php?search=Indonesia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Indonesia</span><br />Population : 47008383"
                    }
                },
                "JO": {
                    "value": 54475776,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jordan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jordan</span><br />Population : 54475776"
                    }
                },
                "IR": {
                    "value": 47604312,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iran, Islamic Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iran, Islamic Republic Of</span><br />Population : 47604312"
                    }
                },
                "IQ": {
                    "value": 38941406,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iraq",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iraq</span><br />Population : 38941406"
                    }
                },
                "IE": {
                    "value": 3479977,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ireland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ireland</span><br />Population : 3479977"
                    }
                },
                "IS": {
                    "value": 15773297,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iceland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iceland</span><br />Population : 15773297"
                    }
                },
                "IL": {
                    "value": 40752957,
                    "href": "https://en.wikipedia.org/w/index.php?search=Israel",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Israel</span><br />Population : 40752957"
                    }
                },
                "IT": {
                    "value": 14687463,
                    "href": "https://en.wikipedia.org/w/index.php?search=Italy",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Italy</span><br />Population : 14687463"
                    }
                },
                "KZ": {
                    "value": 44068955,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kazakhstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kazakhstan</span><br />Population : 44068955"
                    }
                },
                "KE": {
                    "value": 41065546,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kenya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kenya</span><br />Population : 41065546"
                    }
                },
                "KG": {
                    "value": 1026797,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kyrgyzstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kyrgyzstan</span><br />Population : 1026797"
                    }
                },
                "KI": {
                    "value": 1079809,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kiribati",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kiribati</span><br />Population : 1079809"
                    }
                },
                "KW": {
                    "value": 47103440,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kuwait",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kuwait</span><br />Population : 47103440"
                    }
                },
                "LA": {
                    "value": 46118146,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lao People's Democratic Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lao People's Democratic Republic</span><br />Population : 46118146"
                    }
                },
                "LS": {
                    "value": 31378958,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lesotho",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lesotho</span><br />Population : 31378958"
                    }
                },
                "LV": {
                    "value": 18709070,
                    "href": "https://en.wikipedia.org/w/index.php?search=Latvia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Latvia</span><br />Population : 18709070"
                    }
                },
                "LB": {
                    "value": 40661557,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lebanon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lebanon</span><br />Population : 40661557"
                    }
                },
                "LR": {
                    "value": 36546723,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liberia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liberia</span><br />Population : 36546723"
                    }
                },
                "LY": {
                    "value": 25112564,
                    "href": "https://en.wikipedia.org/w/index.php?search=Libya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Libya</span><br />Population : 25112564"
                    }
                },
                "LI": {
                    "value": 58215870,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liechtenstein",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liechtenstein</span><br />Population : 58215870"
                    }
                },
                "LT": {
                    "value": 22871432,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lithuania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lithuania</span><br />Population : 22871432"
                    }
                },
                "LU": {
                    "value": 47916901,
                    "href": "https://en.wikipedia.org/w/index.php?search=Luxembourg",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Luxembourg</span><br />Population : 47916901"
                    }
                },
                "MK": {
                    "value": 25280740,
                    "href": "https://en.wikipedia.org/w/index.php?search=Macedonia, The Former Yugoslav Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Macedonia, The Former Yugoslav Republic Of</span><br />Population : 25280740"
                    }
                },
                "MG": {
                    "value": 20390832,
                    "href": "https://en.wikipedia.org/w/index.php?search=Madagascar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Madagascar</span><br />Population : 20390832"
                    }
                },
                "MY": {
                    "value": 21811191,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malaysia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malaysia</span><br />Population : 21811191"
                    }
                },
                "MW": {
                    "value": 25944305,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malawi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malawi</span><br />Population : 25944305"
                    }
                },
                "MV": {
                    "value": 44986612,
                    "href": "https://en.wikipedia.org/w/index.php?search=Maldives",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Maldives</span><br />Population : 44986612"
                    }
                },
                "ML": {
                    "value": 15674585,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mali",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mali</span><br />Population : 15674585"
                    }
                },
                "MT": {
                    "value": 35608957,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malta",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malta</span><br />Population : 35608957"
                    }
                },
                "MA": {
                    "value": 6194561,
                    "href": "https://en.wikipedia.org/w/index.php?search=Morocco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Morocco</span><br />Population : 6194561"
                    }
                },
                "MU": {
                    "value": 7483303,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritius",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritius</span><br />Population : 7483303"
                    }
                },
                "MR": {
                    "value": 4757751,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritania</span><br />Population : 4757751"
                    }
                },
                "MX": {
                    "value": 32442856,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mexico",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mexico</span><br />Population : 32442856"
                    }
                },
                "FM": {
                    "value": 54183295,
                    "href": "https://en.wikipedia.org/w/index.php?search=Micronesia, Federated States Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Micronesia, Federated States Of</span><br />Population : 54183295"
                    }
                },
                "MD": {
                    "value": 45673941,
                    "href": "https://en.wikipedia.org/w/index.php?search=Moldova, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Moldova, Republic Of</span><br />Population : 45673941"
                    }
                },
                "MC": {
                    "value": 38180957,
                    "href": "https://en.wikipedia.org/w/index.php?search=Monaco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Monaco</span><br />Population : 38180957"
                    }
                },
                "MN": {
                    "value": 10441012,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mongolia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mongolia</span><br />Population : 10441012"
                    }
                },
                "ME": {
                    "value": 25776129,
                    "href": "https://en.wikipedia.org/w/index.php?search=Montenegro",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Montenegro</span><br />Population : 25776129"
                    }
                },
                "MZ": {
                    "value": 22911648,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mozambique",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mozambique</span><br />Population : 22911648"
                    }
                },
                "NA": {
                    "value": 16734826,
                    "href": "https://en.wikipedia.org/w/index.php?search=Namibia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Namibia</span><br />Population : 16734826"
                    }
                },
                "NP": {
                    "value": 57581553,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nepal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nepal</span><br />Population : 57581553"
                    }
                },
                "NI": {
                    "value": 46388690,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nicaragua",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nicaragua</span><br />Population : 46388690"
                    }
                },
                "NE": {
                    "value": 12199551,
                    "href": "https://en.wikipedia.org/w/index.php?search=Niger",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Niger</span><br />Population : 12199551"
                    }
                },
                "NG": {
                    "value": 50859986,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nigeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nigeria</span><br />Population : 50859986"
                    }
                },
                "NO": {
                    "value": 52192600,
                    "href": "https://en.wikipedia.org/w/index.php?search=Norway",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Norway</span><br />Population : 52192600"
                    }
                },
                "NZ": {
                    "value": 31786603,
                    "href": "https://en.wikipedia.org/w/index.php?search=New Zealand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New Zealand</span><br />Population : 31786603"
                    }
                },
                "OM": {
                    "value": 56590775,
                    "href": "https://en.wikipedia.org/w/index.php?search=Oman",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Oman</span><br />Population : 56590775"
                    }
                },
                "UG": {
                    "value": 41347058,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uganda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uganda</span><br />Population : 41347058"
                    }
                },
                "UZ": {
                    "value": 22352280,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uzbekistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uzbekistan</span><br />Population : 22352280"
                    }
                },
                "PK": {
                    "value": 47485492,
                    "href": "https://en.wikipedia.org/w/index.php?search=Pakistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Pakistan</span><br />Population : 47485492"
                    }
                },
                "PS": {
                    "value": 49388443,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palestine, State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palestine, State Of</span><br />Population : 49388443"
                    }
                },
                "PA": {
                    "value": 38736670,
                    "href": "https://en.wikipedia.org/w/index.php?search=Panama",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Panama</span><br />Population : 38736670"
                    }
                },
                "PG": {
                    "value": 26088718,
                    "href": "https://en.wikipedia.org/w/index.php?search=Papua New Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Papua New Guinea</span><br />Population : 26088718"
                    }
                },
                "PY": {
                    "value": 9250982,
                    "href": "https://en.wikipedia.org/w/index.php?search=Paraguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paraguay</span><br />Population : 9250982"
                    }
                },
                "NL": {
                    "value": 33645682,
                    "href": "https://en.wikipedia.org/w/index.php?search=Netherlands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Netherlands</span><br />Population : 33645682"
                    }
                },
                "PE": {
                    "value": 3719445,
                    "href": "https://en.wikipedia.org/w/index.php?search=Peru",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Peru</span><br />Population : 3719445"
                    }
                },
                "PH": {
                    "value": 31580038,
                    "href": "https://en.wikipedia.org/w/index.php?search=Philippines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Philippines</span><br />Population : 31580038"
                    }
                },
                "PL": {
                    "value": 42498700,
                    "href": "https://en.wikipedia.org/w/index.php?search=Poland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Poland</span><br />Population : 42498700"
                    }
                },
                "PT": {
                    "value": 22465616,
                    "href": "https://en.wikipedia.org/w/index.php?search=Portugal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Portugal</span><br />Population : 22465616"
                    }
                },
                "QA": {
                    "value": 46736011,
                    "href": "https://en.wikipedia.org/w/index.php?search=Qatar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Qatar</span><br />Population : 46736011"
                    }
                },
                "DO": {
                    "value": 36954367,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominican Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominican Republic</span><br />Population : 36954367"
                    }
                },
                "RO": {
                    "value": 3094268,
                    "href": "https://en.wikipedia.org/w/index.php?search=Romania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Romania</span><br />Population : 3094268"
                    }
                },
                "GB": {
                    "value": 58901371,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Kingdom",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Kingdom</span><br />Population : 58901371"
                    }
                },
                "RU": {
                    "value": 8676989,
                    "href": "https://en.wikipedia.org/w/index.php?search=Russian Federation",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Russian Federation</span><br />Population : 8676989"
                    }
                },
                "RW": {
                    "value": 10389828,
                    "href": "https://en.wikipedia.org/w/index.php?search=Rwanda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Rwanda</span><br />Population : 10389828"
                    }
                },
                "KN": {
                    "value": 16453314,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Kitts And Nevis",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Kitts And Nevis</span><br />Population : 16453314"
                    }
                },
                "SM": {
                    "value": 36256070,
                    "href": "https://en.wikipedia.org/w/index.php?search=San Marino",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">San Marino</span><br />Population : 36256070"
                    }
                },
                "VC": {
                    "value": 59883008,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Vincent And The Grenadines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Vincent And The Grenadines</span><br />Population : 59883008"
                    }
                },
                "LC": {
                    "value": 9914547,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Lucia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Lucia</span><br />Population : 9914547"
                    }
                },
                "SV": {
                    "value": 58241462,
                    "href": "https://en.wikipedia.org/w/index.php?search=El Salvador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">El Salvador</span><br />Population : 58241462"
                    }
                },
                "WS": {
                    "value": 57482840,
                    "href": "https://en.wikipedia.org/w/index.php?search=Samoa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Samoa</span><br />Population : 57482840"
                    }
                },
                "ST": {
                    "value": 41244690,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sao Tome And Principe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sao Tome And Principe</span><br />Population : 41244690"
                    }
                },
                "SN": {
                    "value": 3706649,
                    "href": "https://en.wikipedia.org/w/index.php?search=Senegal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Senegal</span><br />Population : 3706649"
                    }
                },
                "RS": {
                    "value": 14274334,
                    "href": "https://en.wikipedia.org/w/index.php?search=Serbia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Serbia</span><br />Population : 14274334"
                    }
                },
                "SC": {
                    "value": 15884805,
                    "href": "https://en.wikipedia.org/w/index.php?search=Seychelles",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Seychelles</span><br />Population : 15884805"
                    }
                },
                "SL": {
                    "value": 3302661,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sierra Leone",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sierra Leone</span><br />Population : 3302661"
                    }
                },
                "SG": {
                    "value": 49794260,
                    "href": "https://en.wikipedia.org/w/index.php?search=Singapore",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Singapore</span><br />Population : 49794260"
                    }
                },
                "SK": {
                    "value": 39917560,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovakia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovakia</span><br />Population : 39917560"
                    }
                },
                "SI": {
                    "value": 14415091,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovenia</span><br />Population : 14415091"
                    }
                },
                "SO": {
                    "value": 26547546,
                    "href": "https://en.wikipedia.org/w/index.php?search=Somalia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Somalia</span><br />Population : 26547546"
                    }
                },
                "SD": {
                    "value": 56455503,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sudan</span><br />Population : 56455503"
                    }
                },
                "SS": {
                    "value": 20986761,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Sudan</span><br />Population : 20986761"
                    }
                },
                "LK": {
                    "value": 6276822,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sri Lanka",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sri Lanka</span><br />Population : 6276822"
                    }
                },
                "SE": {
                    "value": 41719971,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sweden",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sweden</span><br />Population : 41719971"
                    }
                },
                "CH": {
                    "value": 21818503,
                    "href": "https://en.wikipedia.org/w/index.php?search=Switzerland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Switzerland</span><br />Population : 21818503"
                    }
                },
                "SR": {
                    "value": 52947565,
                    "href": "https://en.wikipedia.org/w/index.php?search=Suriname",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Suriname</span><br />Population : 52947565"
                    }
                },
                "SZ": {
                    "value": 34523123,
                    "href": "https://en.wikipedia.org/w/index.php?search=Swaziland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Swaziland</span><br />Population : 34523123"
                    }
                },
                "SY": {
                    "value": 9510559,
                    "href": "https://en.wikipedia.org/w/index.php?search=Syrian Arab Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Syrian Arab Republic</span><br />Population : 9510559"
                    }
                },
                "TJ": {
                    "value": 33861386,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tajikistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tajikistan</span><br />Population : 33861386"
                    }
                },
                "TZ": {
                    "value": 21615594,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tanzania, United Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tanzania, United Republic Of</span><br />Population : 21615594"
                    }
                },
                "TD": {
                    "value": 52357120,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chad",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chad</span><br />Population : 52357120"
                    }
                },
                "CZ": {
                    "value": 40359937,
                    "href": "https://en.wikipedia.org/w/index.php?search=Czech Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Czech Republic</span><br />Population : 40359937"
                    }
                },
                "TH": {
                    "value": 30812277,
                    "href": "https://en.wikipedia.org/w/index.php?search=Thailand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Thailand</span><br />Population : 30812277"
                    }
                },
                "TL": {
                    "value": 22456476,
                    "href": "https://en.wikipedia.org/w/index.php?search=Timor-leste",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Timor-leste</span><br />Population : 22456476"
                    }
                },
                "TG": {
                    "value": 42931937,
                    "href": "https://en.wikipedia.org/w/index.php?search=Togo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Togo</span><br />Population : 42931937"
                    }
                },
                "TO": {
                    "value": 35058728,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tonga",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tonga</span><br />Population : 35058728"
                    }
                },
                "TT": {
                    "value": 40749301,
                    "href": "https://en.wikipedia.org/w/index.php?search=Trinidad And Tobago",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Trinidad And Tobago</span><br />Population : 40749301"
                    }
                },
                "TN": {
                    "value": 1185833,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tunisia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tunisia</span><br />Population : 1185833"
                    }
                },
                "TM": {
                    "value": 19350699,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkmenistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkmenistan</span><br />Population : 19350699"
                    }
                },
                "TR": {
                    "value": 44147559,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkey",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkey</span><br />Population : 44147559"
                    }
                },
                "TV": {
                    "value": 1900582,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tuvalu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tuvalu</span><br />Population : 1900582"
                    }
                },
                "VU": {
                    "value": 53269294,
                    "href": "https://en.wikipedia.org/w/index.php?search=Vanuatu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Vanuatu</span><br />Population : 53269294"
                    }
                },
                "VE": {
                    "value": 24666531,
                    "href": "https://en.wikipedia.org/w/index.php?search=Venezuela, Bolivarian Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Venezuela, Bolivarian Republic Of</span><br />Population : 24666531"
                    }
                },
                "VN": {
                    "value": 28317053,
                    "href": "https://en.wikipedia.org/w/index.php?search=Viet Nam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Viet Nam</span><br />Population : 28317053"
                    }
                },
                "UA": {
                    "value": 2244247,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ukraine",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ukraine</span><br />Population : 2244247"
                    }
                },
                "UY": {
                    "value": 4622479,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uruguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uruguay</span><br />Population : 4622479"
                    }
                },
                "YE": {
                    "value": 12082559,
                    "href": "https://en.wikipedia.org/w/index.php?search=Yemen",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Yemen</span><br />Population : 12082559"
                    }
                },
                "ZM": {
                    "value": 38107837,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zambia</span><br />Population : 38107837"
                    }
                },
                "ZW": {
                    "value": 39908420,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zimbabwe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zimbabwe</span><br />Population : 39908420"
                    }
                }
            },
            "plots": {
                "paris": {
                    "value": 345666,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paris</span><br />Population: 345666"
                    }
                },
                "newyork": {
                    "value": 673834,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New-York</span><br />Population: 673834"
                    }
                },
                "sydney": {
                    "value": 897241,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sydney</span><br />Population: 897241"
                    }
                },
                "brasilia": {
                    "value": 639227,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brasilia</span><br />Population: 639227"
                    }
                },
                "tokyo": {
                    "value": 493835,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tokyo</span><br />Population: 493835"
                    }
                }
            }
        },
        "2007": {
            "areas": {
                "AF": {
                    "value": 15577701,
                    "href": "https://en.wikipedia.org/w/index.php?search=Afghanistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Afghanistan</span><br />Population : 15577701"
                    }
                },
                "ZA": {
                    "value": 7265771,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Africa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Africa</span><br />Population : 7265771"
                    }
                },
                "AL": {
                    "value": 10060788,
                    "href": "https://en.wikipedia.org/w/index.php?search=Albania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Albania</span><br />Population : 10060788"
                    }
                },
                "DZ": {
                    "value": 59206647,
                    "href": "https://en.wikipedia.org/w/index.php?search=Algeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Algeria</span><br />Population : 59206647"
                    }
                },
                "DE": {
                    "value": 27913065,
                    "href": "https://en.wikipedia.org/w/index.php?search=Germany",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Germany</span><br />Population : 27913065"
                    }
                },
                "AD": {
                    "value": 37764172,
                    "href": "https://en.wikipedia.org/w/index.php?search=Andorra",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Andorra</span><br />Population : 37764172"
                    }
                },
                "AO": {
                    "value": 28655234,
                    "href": "https://en.wikipedia.org/w/index.php?search=Angola",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Angola</span><br />Population : 28655234"
                    }
                },
                "AG": {
                    "value": 23194989,
                    "href": "https://en.wikipedia.org/w/index.php?search=Antigua And Barbuda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Antigua And Barbuda</span><br />Population : 23194989"
                    }
                },
                "SA": {
                    "value": 14861123,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saudi Arabia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saudi Arabia</span><br />Population : 14861123"
                    }
                },
                "AR": {
                    "value": 56446363,
                    "href": "https://en.wikipedia.org/w/index.php?search=Argentina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Argentina</span><br />Population : 56446363"
                    }
                },
                "AM": {
                    "value": 17182687,
                    "href": "https://en.wikipedia.org/w/index.php?search=Armenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Armenia</span><br />Population : 17182687"
                    }
                },
                "AU": {
                    "value": 4381182,
                    "href": "https://en.wikipedia.org/w/index.php?search=Australia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Australia</span><br />Population : 4381182"
                    }
                },
                "AT": {
                    "value": 19475003,
                    "href": "https://en.wikipedia.org/w/index.php?search=Austria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Austria</span><br />Population : 19475003"
                    }
                },
                "AZ": {
                    "value": 24002966,
                    "href": "https://en.wikipedia.org/w/index.php?search=Azerbaijan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Azerbaijan</span><br />Population : 24002966"
                    }
                },
                "BS": {
                    "value": 3721273,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahamas",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahamas</span><br />Population : 3721273"
                    }
                },
                "BH": {
                    "value": 8380853,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahrain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahrain</span><br />Population : 8380853"
                    }
                },
                "BD": {
                    "value": 54857828,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bangladesh",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bangladesh</span><br />Population : 54857828"
                    }
                },
                "BB": {
                    "value": 50874610,
                    "href": "https://en.wikipedia.org/w/index.php?search=Barbados",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Barbados</span><br />Population : 50874610"
                    }
                },
                "BE": {
                    "value": 46299118,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belgium",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belgium</span><br />Population : 46299118"
                    }
                },
                "BZ": {
                    "value": 10859625,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belize",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belize</span><br />Population : 10859625"
                    }
                },
                "BJ": {
                    "value": 44262723,
                    "href": "https://en.wikipedia.org/w/index.php?search=Benin",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Benin</span><br />Population : 44262723"
                    }
                },
                "BT": {
                    "value": 37851917,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bhutan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bhutan</span><br />Population : 37851917"
                    }
                },
                "BY": {
                    "value": 53194345,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belarus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belarus</span><br />Population : 53194345"
                    }
                },
                "MM": {
                    "value": 17433124,
                    "href": "https://en.wikipedia.org/w/index.php?search=Myanmar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Myanmar</span><br />Population : 17433124"
                    }
                },
                "BO": {
                    "value": 792813,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bolivia, Plurinational State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bolivia, Plurinational State Of</span><br />Population : 792813"
                    }
                },
                "BA": {
                    "value": 35475513,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bosnia And Herzegovina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bosnia And Herzegovina</span><br />Population : 35475513"
                    }
                },
                "BW": {
                    "value": 22535080,
                    "href": "https://en.wikipedia.org/w/index.php?search=Botswana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Botswana</span><br />Population : 22535080"
                    }
                },
                "BR": {
                    "value": 3766973,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brazil",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brazil</span><br />Population : 3766973"
                    }
                },
                "BN": {
                    "value": 27401224,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brunei Darussalam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brunei Darussalam</span><br />Population : 27401224"
                    }
                },
                "BG": {
                    "value": 4436023,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bulgaria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bulgaria</span><br />Population : 4436023"
                    }
                },
                "BF": {
                    "value": 42299448,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burkina Faso",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burkina Faso</span><br />Population : 42299448"
                    }
                },
                "BI": {
                    "value": 35376801,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burundi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burundi</span><br />Population : 35376801"
                    }
                },
                "KH": {
                    "value": 17391080,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cambodia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cambodia</span><br />Population : 17391080"
                    }
                },
                "CM": {
                    "value": 55174073,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cameroon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cameroon</span><br />Population : 55174073"
                    }
                },
                "CA": {
                    "value": 50715573,
                    "href": "https://en.wikipedia.org/w/index.php?search=Canada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Canada</span><br />Population : 50715573"
                    }
                },
                "CV": {
                    "value": 28028229,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cape Verde",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cape Verde</span><br />Population : 28028229"
                    }
                },
                "CF": {
                    "value": 13815506,
                    "href": "https://en.wikipedia.org/w/index.php?search=Central African Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Central African Republic</span><br />Population : 13815506"
                    }
                },
                "CL": {
                    "value": 28580286,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chile",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chile</span><br />Population : 28580286"
                    }
                },
                "CN": {
                    "value": 15961581,
                    "href": "https://en.wikipedia.org/w/index.php?search=China",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">China</span><br />Population : 15961581"
                    }
                },
                "CY": {
                    "value": 47236884,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cyprus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cyprus</span><br />Population : 47236884"
                    }
                },
                "CO": {
                    "value": 29777628,
                    "href": "https://en.wikipedia.org/w/index.php?search=Colombia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Colombia</span><br />Population : 29777628"
                    }
                },
                "KM": {
                    "value": 35095288,
                    "href": "https://en.wikipedia.org/w/index.php?search=Comoros",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Comoros</span><br />Population : 35095288"
                    }
                },
                "CG": {
                    "value": 55965598,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo</span><br />Population : 55965598"
                    }
                },
                "CD": {
                    "value": 8768390,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo, The Democratic Republic Of The",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo, The Democratic Republic Of The</span><br />Population : 8768390"
                    }
                },
                "KP": {
                    "value": 48430570,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Democratic People's Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Democratic People's Republic Of</span><br />Population : 48430570"
                    }
                },
                "KR": {
                    "value": 35409705,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Republic Of</span><br />Population : 35409705"
                    }
                },
                "CR": {
                    "value": 19105746,
                    "href": "https://en.wikipedia.org/w/index.php?search=Costa Rica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Costa Rica</span><br />Population : 19105746"
                    }
                },
                "CI": {
                    "value": 38038373,
                    "href": "https://en.wikipedia.org/w/index.php?search=C\u00d4te D'ivoire",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">C\u00d4te D'ivoire</span><br />Population : 38038373"
                    }
                },
                "HR": {
                    "value": 22977457,
                    "href": "https://en.wikipedia.org/w/index.php?search=Croatia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Croatia</span><br />Population : 22977457"
                    }
                },
                "CU": {
                    "value": 20164160,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cuba",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cuba</span><br />Population : 20164160"
                    }
                },
                "DK": {
                    "value": 23310153,
                    "href": "https://en.wikipedia.org/w/index.php?search=Denmark",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Denmark</span><br />Population : 23310153"
                    }
                },
                "DJ": {
                    "value": 50812458,
                    "href": "https://en.wikipedia.org/w/index.php?search=Djibouti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Djibouti</span><br />Population : 50812458"
                    }
                },
                "DM": {
                    "value": 56371415,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominica</span><br />Population : 56371415"
                    }
                },
                "EG": {
                    "value": 9949279,
                    "href": "https://en.wikipedia.org/w/index.php?search=Egypt",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Egypt</span><br />Population : 9949279"
                    }
                },
                "AE": {
                    "value": 36756943,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Arab Emirates",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Arab Emirates</span><br />Population : 36756943"
                    }
                },
                "EC": {
                    "value": 52706269,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ecuador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ecuador</span><br />Population : 52706269"
                    }
                },
                "ER": {
                    "value": 41915567,
                    "href": "https://en.wikipedia.org/w/index.php?search=Eritrea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Eritrea</span><br />Population : 41915567"
                    }
                },
                "ES": {
                    "value": 55305689,
                    "href": "https://en.wikipedia.org/w/index.php?search=Spain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Spain</span><br />Population : 55305689"
                    }
                },
                "EE": {
                    "value": 57574241,
                    "href": "https://en.wikipedia.org/w/index.php?search=Estonia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Estonia</span><br />Population : 57574241"
                    }
                },
                "US": {
                    "value": 19385431,
                    "href": "https://en.wikipedia.org/w/index.php?search=United States",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United States</span><br />Population : 19385431"
                    }
                },
                "ET": {
                    "value": 22663040,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ethiopia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ethiopia</span><br />Population : 22663040"
                    }
                },
                "FJ": {
                    "value": 57024012,
                    "href": "https://en.wikipedia.org/w/index.php?search=Fiji",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Fiji</span><br />Population : 57024012"
                    }
                },
                "FI": {
                    "value": 53940171,
                    "href": "https://en.wikipedia.org/w/index.php?search=Finland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Finland</span><br />Population : 53940171"
                    }
                },
                "FR": {
                    "value": 16365570,
                    "href": "https://en.wikipedia.org/w/index.php?search=France",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">France</span><br />Population : 16365570"
                    }
                },
                "GA": {
                    "value": 11716958,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gabon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gabon</span><br />Population : 11716958"
                    }
                },
                "GM": {
                    "value": 5744873,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gambia</span><br />Population : 5744873"
                    }
                },
                "GE": {
                    "value": 23982858,
                    "href": "https://en.wikipedia.org/w/index.php?search=Georgia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Georgia</span><br />Population : 23982858"
                    }
                },
                "GH": {
                    "value": 19312311,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ghana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ghana</span><br />Population : 19312311"
                    }
                },
                "GR": {
                    "value": 52130448,
                    "href": "https://en.wikipedia.org/w/index.php?search=Greece",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Greece</span><br />Population : 52130448"
                    }
                },
                "GD": {
                    "value": 41858899,
                    "href": "https://en.wikipedia.org/w/index.php?search=Grenada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Grenada</span><br />Population : 41858899"
                    }
                },
                "GT": {
                    "value": 55680430,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guatemala",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guatemala</span><br />Population : 55680430"
                    }
                },
                "GN": {
                    "value": 33841278,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea</span><br />Population : 33841278"
                    }
                },
                "GQ": {
                    "value": 37206632,
                    "href": "https://en.wikipedia.org/w/index.php?search=Equatorial Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Equatorial Guinea</span><br />Population : 37206632"
                    }
                },
                "GW": {
                    "value": 36206714,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea-bissau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea-bissau</span><br />Population : 36206714"
                    }
                },
                "GY": {
                    "value": 27361008,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guyana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guyana</span><br />Population : 27361008"
                    }
                },
                "HT": {
                    "value": 35618097,
                    "href": "https://en.wikipedia.org/w/index.php?search=Haiti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Haiti</span><br />Population : 35618097"
                    }
                },
                "HN": {
                    "value": 9998636,
                    "href": "https://en.wikipedia.org/w/index.php?search=Honduras",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Honduras</span><br />Population : 9998636"
                    }
                },
                "HU": {
                    "value": 9378943,
                    "href": "https://en.wikipedia.org/w/index.php?search=Hungary",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Hungary</span><br />Population : 9378943"
                    }
                },
                "JM": {
                    "value": 27002719,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jamaica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jamaica</span><br />Population : 27002719"
                    }
                },
                "JP": {
                    "value": 30258392,
                    "href": "https://en.wikipedia.org/w/index.php?search=Japan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Japan</span><br />Population : 30258392"
                    }
                },
                "MH": {
                    "value": 43509586,
                    "href": "https://en.wikipedia.org/w/index.php?search=Marshall Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Marshall Islands</span><br />Population : 43509586"
                    }
                },
                "PW": {
                    "value": 11916211,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palau</span><br />Population : 11916211"
                    }
                },
                "SB": {
                    "value": 52733689,
                    "href": "https://en.wikipedia.org/w/index.php?search=Solomon Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Solomon Islands</span><br />Population : 52733689"
                    }
                },
                "IN": {
                    "value": 53327790,
                    "href": "https://en.wikipedia.org/w/index.php?search=India",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">India</span><br />Population : 53327790"
                    }
                },
                "ID": {
                    "value": 1092605,
                    "href": "https://en.wikipedia.org/w/index.php?search=Indonesia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Indonesia</span><br />Population : 1092605"
                    }
                },
                "JO": {
                    "value": 4509143,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jordan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jordan</span><br />Population : 4509143"
                    }
                },
                "IR": {
                    "value": 12832040,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iran, Islamic Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iran, Islamic Republic Of</span><br />Population : 12832040"
                    }
                },
                "IQ": {
                    "value": 50541913,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iraq",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iraq</span><br />Population : 50541913"
                    }
                },
                "IE": {
                    "value": 15650821,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ireland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ireland</span><br />Population : 15650821"
                    }
                },
                "IS": {
                    "value": 37698364,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iceland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iceland</span><br />Population : 37698364"
                    }
                },
                "IL": {
                    "value": 25225900,
                    "href": "https://en.wikipedia.org/w/index.php?search=Israel",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Israel</span><br />Population : 25225900"
                    }
                },
                "IT": {
                    "value": 57466388,
                    "href": "https://en.wikipedia.org/w/index.php?search=Italy",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Italy</span><br />Population : 57466388"
                    }
                },
                "KZ": {
                    "value": 10437356,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kazakhstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kazakhstan</span><br />Population : 10437356"
                    }
                },
                "KE": {
                    "value": 12274499,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kenya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kenya</span><br />Population : 12274499"
                    }
                },
                "KG": {
                    "value": 58093393,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kyrgyzstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kyrgyzstan</span><br />Population : 58093393"
                    }
                },
                "KI": {
                    "value": 19816839,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kiribati",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kiribati</span><br />Population : 19816839"
                    }
                },
                "KW": {
                    "value": 58455338,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kuwait",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kuwait</span><br />Population : 58455338"
                    }
                },
                "LA": {
                    "value": 38678174,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lao People's Democratic Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lao People's Democratic Republic</span><br />Population : 38678174"
                    }
                },
                "LS": {
                    "value": 49662644,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lesotho",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lesotho</span><br />Population : 49662644"
                    }
                },
                "LV": {
                    "value": 33058893,
                    "href": "https://en.wikipedia.org/w/index.php?search=Latvia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Latvia</span><br />Population : 33058893"
                    }
                },
                "LB": {
                    "value": 23057889,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lebanon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lebanon</span><br />Population : 23057889"
                    }
                },
                "LR": {
                    "value": 17700012,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liberia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liberia</span><br />Population : 17700012"
                    }
                },
                "LY": {
                    "value": 28011777,
                    "href": "https://en.wikipedia.org/w/index.php?search=Libya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Libya</span><br />Population : 28011777"
                    }
                },
                "LI": {
                    "value": 42908173,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liechtenstein",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liechtenstein</span><br />Population : 42908173"
                    }
                },
                "LT": {
                    "value": 37148135,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lithuania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lithuania</span><br />Population : 37148135"
                    }
                },
                "LU": {
                    "value": 59780640,
                    "href": "https://en.wikipedia.org/w/index.php?search=Luxembourg",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Luxembourg</span><br />Population : 59780640"
                    }
                },
                "MK": {
                    "value": 51168918,
                    "href": "https://en.wikipedia.org/w/index.php?search=Macedonia, The Former Yugoslav Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Macedonia, The Former Yugoslav Republic Of</span><br />Population : 51168918"
                    }
                },
                "MG": {
                    "value": 25030304,
                    "href": "https://en.wikipedia.org/w/index.php?search=Madagascar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Madagascar</span><br />Population : 25030304"
                    }
                },
                "MY": {
                    "value": 23979202,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malaysia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malaysia</span><br />Population : 23979202"
                    }
                },
                "MW": {
                    "value": 5810681,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malawi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malawi</span><br />Population : 5810681"
                    }
                },
                "MV": {
                    "value": 27412192,
                    "href": "https://en.wikipedia.org/w/index.php?search=Maldives",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Maldives</span><br />Population : 27412192"
                    }
                },
                "ML": {
                    "value": 44940912,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mali",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mali</span><br />Population : 44940912"
                    }
                },
                "MT": {
                    "value": 56554215,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malta",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malta</span><br />Population : 56554215"
                    }
                },
                "MA": {
                    "value": 26130762,
                    "href": "https://en.wikipedia.org/w/index.php?search=Morocco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Morocco</span><br />Population : 26130762"
                    }
                },
                "MU": {
                    "value": 14769723,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritius",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritius</span><br />Population : 14769723"
                    }
                },
                "MR": {
                    "value": 18405621,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritania</span><br />Population : 18405621"
                    }
                },
                "MX": {
                    "value": 58126297,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mexico",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mexico</span><br />Population : 58126297"
                    }
                },
                "FM": {
                    "value": 21531506,
                    "href": "https://en.wikipedia.org/w/index.php?search=Micronesia, Federated States Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Micronesia, Federated States Of</span><br />Population : 21531506"
                    }
                },
                "MD": {
                    "value": 41319638,
                    "href": "https://en.wikipedia.org/w/index.php?search=Moldova, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Moldova, Republic Of</span><br />Population : 41319638"
                    }
                },
                "MC": {
                    "value": 10940057,
                    "href": "https://en.wikipedia.org/w/index.php?search=Monaco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Monaco</span><br />Population : 10940057"
                    }
                },
                "MN": {
                    "value": 41798575,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mongolia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mongolia</span><br />Population : 41798575"
                    }
                },
                "ME": {
                    "value": 42553540,
                    "href": "https://en.wikipedia.org/w/index.php?search=Montenegro",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Montenegro</span><br />Population : 42553540"
                    }
                },
                "MZ": {
                    "value": 45290061,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mozambique",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mozambique</span><br />Population : 45290061"
                    }
                },
                "NA": {
                    "value": 58109845,
                    "href": "https://en.wikipedia.org/w/index.php?search=Namibia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Namibia</span><br />Population : 58109845"
                    }
                },
                "NP": {
                    "value": 50624173,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nepal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nepal</span><br />Population : 50624173"
                    }
                },
                "NI": {
                    "value": 49887488,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nicaragua",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nicaragua</span><br />Population : 49887488"
                    }
                },
                "NE": {
                    "value": 54759116,
                    "href": "https://en.wikipedia.org/w/index.php?search=Niger",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Niger</span><br />Population : 54759116"
                    }
                },
                "NG": {
                    "value": 45730609,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nigeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nigeria</span><br />Population : 45730609"
                    }
                },
                "NO": {
                    "value": 37806217,
                    "href": "https://en.wikipedia.org/w/index.php?search=Norway",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Norway</span><br />Population : 37806217"
                    }
                },
                "NZ": {
                    "value": 34173975,
                    "href": "https://en.wikipedia.org/w/index.php?search=New Zealand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New Zealand</span><br />Population : 34173975"
                    }
                },
                "OM": {
                    "value": 7954928,
                    "href": "https://en.wikipedia.org/w/index.php?search=Oman",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Oman</span><br />Population : 7954928"
                    }
                },
                "UG": {
                    "value": 9367975,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uganda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uganda</span><br />Population : 9367975"
                    }
                },
                "UZ": {
                    "value": 46397830,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uzbekistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uzbekistan</span><br />Population : 46397830"
                    }
                },
                "PK": {
                    "value": 16003625,
                    "href": "https://en.wikipedia.org/w/index.php?search=Pakistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Pakistan</span><br />Population : 16003625"
                    }
                },
                "PS": {
                    "value": 52755625,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palestine, State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palestine, State Of</span><br />Population : 52755625"
                    }
                },
                "PA": {
                    "value": 14537567,
                    "href": "https://en.wikipedia.org/w/index.php?search=Panama",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Panama</span><br />Population : 14537567"
                    }
                },
                "PG": {
                    "value": 29602139,
                    "href": "https://en.wikipedia.org/w/index.php?search=Papua New Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Papua New Guinea</span><br />Population : 29602139"
                    }
                },
                "PY": {
                    "value": 45917066,
                    "href": "https://en.wikipedia.org/w/index.php?search=Paraguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paraguay</span><br />Population : 45917066"
                    }
                },
                "NL": {
                    "value": 7589328,
                    "href": "https://en.wikipedia.org/w/index.php?search=Netherlands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Netherlands</span><br />Population : 7589328"
                    }
                },
                "PE": {
                    "value": 36905011,
                    "href": "https://en.wikipedia.org/w/index.php?search=Peru",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Peru</span><br />Population : 36905011"
                    }
                },
                "PH": {
                    "value": 30472269,
                    "href": "https://en.wikipedia.org/w/index.php?search=Philippines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Philippines</span><br />Population : 30472269"
                    }
                },
                "PL": {
                    "value": 24704919,
                    "href": "https://en.wikipedia.org/w/index.php?search=Poland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Poland</span><br />Population : 24704919"
                    }
                },
                "PT": {
                    "value": 20334164,
                    "href": "https://en.wikipedia.org/w/index.php?search=Portugal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Portugal</span><br />Population : 20334164"
                    }
                },
                "QA": {
                    "value": 22185931,
                    "href": "https://en.wikipedia.org/w/index.php?search=Qatar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Qatar</span><br />Population : 22185931"
                    }
                },
                "DO": {
                    "value": 2211343,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominican Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominican Republic</span><br />Population : 2211343"
                    }
                },
                "RO": {
                    "value": 2907812,
                    "href": "https://en.wikipedia.org/w/index.php?search=Romania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Romania</span><br />Population : 2907812"
                    }
                },
                "GB": {
                    "value": 29218259,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Kingdom",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Kingdom</span><br />Population : 29218259"
                    }
                },
                "RU": {
                    "value": 5945953,
                    "href": "https://en.wikipedia.org/w/index.php?search=Russian Federation",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Russian Federation</span><br />Population : 5945953"
                    }
                },
                "RW": {
                    "value": 47772489,
                    "href": "https://en.wikipedia.org/w/index.php?search=Rwanda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Rwanda</span><br />Population : 47772489"
                    }
                },
                "KN": {
                    "value": 1116369,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Kitts And Nevis",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Kitts And Nevis</span><br />Population : 1116369"
                    }
                },
                "SM": {
                    "value": 2419735,
                    "href": "https://en.wikipedia.org/w/index.php?search=San Marino",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">San Marino</span><br />Population : 2419735"
                    }
                },
                "VC": {
                    "value": 53700702,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Vincent And The Grenadines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Vincent And The Grenadines</span><br />Population : 53700702"
                    }
                },
                "LC": {
                    "value": 558828,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Lucia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Lucia</span><br />Population : 558828"
                    }
                },
                "SV": {
                    "value": 9971215,
                    "href": "https://en.wikipedia.org/w/index.php?search=El Salvador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">El Salvador</span><br />Population : 9971215"
                    }
                },
                "WS": {
                    "value": 57866721,
                    "href": "https://en.wikipedia.org/w/index.php?search=Samoa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Samoa</span><br />Population : 57866721"
                    }
                },
                "ST": {
                    "value": 21315802,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sao Tome And Principe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sao Tome And Principe</span><br />Population : 21315802"
                    }
                },
                "SN": {
                    "value": 23423489,
                    "href": "https://en.wikipedia.org/w/index.php?search=Senegal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Senegal</span><br />Population : 23423489"
                    }
                },
                "RS": {
                    "value": 50062976,
                    "href": "https://en.wikipedia.org/w/index.php?search=Serbia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Serbia</span><br />Population : 50062976"
                    }
                },
                "SC": {
                    "value": 43937338,
                    "href": "https://en.wikipedia.org/w/index.php?search=Seychelles",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Seychelles</span><br />Population : 43937338"
                    }
                },
                "SL": {
                    "value": 34206879,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sierra Leone",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sierra Leone</span><br />Population : 34206879"
                    }
                },
                "SG": {
                    "value": 9669595,
                    "href": "https://en.wikipedia.org/w/index.php?search=Singapore",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Singapore</span><br />Population : 9669595"
                    }
                },
                "SK": {
                    "value": 52132276,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovakia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovakia</span><br />Population : 52132276"
                    }
                },
                "SI": {
                    "value": 18659714,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovenia</span><br />Population : 18659714"
                    }
                },
                "SO": {
                    "value": 8139557,
                    "href": "https://en.wikipedia.org/w/index.php?search=Somalia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Somalia</span><br />Population : 8139557"
                    }
                },
                "SD": {
                    "value": 2350271,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sudan</span><br />Population : 2350271"
                    }
                },
                "SS": {
                    "value": 36769739,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Sudan</span><br />Population : 36769739"
                    }
                },
                "LK": {
                    "value": 10111972,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sri Lanka",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sri Lanka</span><br />Population : 10111972"
                    }
                },
                "SE": {
                    "value": 8629461,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sweden",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sweden</span><br />Population : 8629461"
                    }
                },
                "CH": {
                    "value": 14568643,
                    "href": "https://en.wikipedia.org/w/index.php?search=Switzerland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Switzerland</span><br />Population : 14568643"
                    }
                },
                "SR": {
                    "value": 54515992,
                    "href": "https://en.wikipedia.org/w/index.php?search=Suriname",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Suriname</span><br />Population : 54515992"
                    }
                },
                "SZ": {
                    "value": 16422238,
                    "href": "https://en.wikipedia.org/w/index.php?search=Swaziland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Swaziland</span><br />Population : 16422238"
                    }
                },
                "SY": {
                    "value": 11342218,
                    "href": "https://en.wikipedia.org/w/index.php?search=Syrian Arab Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Syrian Arab Republic</span><br />Population : 11342218"
                    }
                },
                "TJ": {
                    "value": 29477835,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tajikistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tajikistan</span><br />Population : 29477835"
                    }
                },
                "TZ": {
                    "value": 6161657,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tanzania, United Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tanzania, United Republic Of</span><br />Population : 6161657"
                    }
                },
                "TD": {
                    "value": 5768637,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chad",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chad</span><br />Population : 5768637"
                    }
                },
                "CZ": {
                    "value": 21893451,
                    "href": "https://en.wikipedia.org/w/index.php?search=Czech Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Czech Republic</span><br />Population : 21893451"
                    }
                },
                "TH": {
                    "value": 280972,
                    "href": "https://en.wikipedia.org/w/index.php?search=Thailand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Thailand</span><br />Population : 280972"
                    }
                },
                "TL": {
                    "value": 2147363,
                    "href": "https://en.wikipedia.org/w/index.php?search=Timor-leste",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Timor-leste</span><br />Population : 2147363"
                    }
                },
                "TG": {
                    "value": 36179294,
                    "href": "https://en.wikipedia.org/w/index.php?search=Togo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Togo</span><br />Population : 36179294"
                    }
                },
                "TO": {
                    "value": 15948785,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tonga",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tonga</span><br />Population : 15948785"
                    }
                },
                "TT": {
                    "value": 29931180,
                    "href": "https://en.wikipedia.org/w/index.php?search=Trinidad And Tobago",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Trinidad And Tobago</span><br />Population : 29931180"
                    }
                },
                "TN": {
                    "value": 3163732,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tunisia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tunisia</span><br />Population : 3163732"
                    }
                },
                "TM": {
                    "value": 15932333,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkmenistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkmenistan</span><br />Population : 15932333"
                    }
                },
                "TR": {
                    "value": 59023847,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkey",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkey</span><br />Population : 59023847"
                    }
                },
                "TV": {
                    "value": 11731582,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tuvalu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tuvalu</span><br />Population : 11731582"
                    }
                },
                "VU": {
                    "value": 59751392,
                    "href": "https://en.wikipedia.org/w/index.php?search=Vanuatu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Vanuatu</span><br />Population : 59751392"
                    }
                },
                "VE": {
                    "value": 3055880,
                    "href": "https://en.wikipedia.org/w/index.php?search=Venezuela, Bolivarian Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Venezuela, Bolivarian Republic Of</span><br />Population : 3055880"
                    }
                },
                "VN": {
                    "value": 6984259,
                    "href": "https://en.wikipedia.org/w/index.php?search=Viet Nam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Viet Nam</span><br />Population : 6984259"
                    }
                },
                "UA": {
                    "value": 48635306,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ukraine",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ukraine</span><br />Population : 48635306"
                    }
                },
                "UY": {
                    "value": 12800964,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uruguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uruguay</span><br />Population : 12800964"
                    }
                },
                "YE": {
                    "value": 25628061,
                    "href": "https://en.wikipedia.org/w/index.php?search=Yemen",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Yemen</span><br />Population : 25628061"
                    }
                },
                "ZM": {
                    "value": 45145648,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zambia</span><br />Population : 45145648"
                    }
                },
                "ZW": {
                    "value": 33945474,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zimbabwe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zimbabwe</span><br />Population : 33945474"
                    }
                }
            },
            "plots": {
                "paris": {
                    "value": 860840,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paris</span><br />Population: 860840"
                    }
                },
                "newyork": {
                    "value": 608978,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New-York</span><br />Population: 608978"
                    }
                },
                "sydney": {
                    "value": 784192,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sydney</span><br />Population: 784192"
                    }
                },
                "brasilia": {
                    "value": 348101,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brasilia</span><br />Population: 348101"
                    }
                },
                "tokyo": {
                    "value": 567407,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tokyo</span><br />Population: 567407"
                    }
                }
            }
        },
        "2008": {
            "areas": {
                "AF": {
                    "value": 19880820,
                    "href": "https://en.wikipedia.org/w/index.php?search=Afghanistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Afghanistan</span><br />Population : 19880820"
                    }
                },
                "ZA": {
                    "value": 25183856,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Africa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Africa</span><br />Population : 25183856"
                    }
                },
                "AL": {
                    "value": 51947647,
                    "href": "https://en.wikipedia.org/w/index.php?search=Albania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Albania</span><br />Population : 51947647"
                    }
                },
                "DZ": {
                    "value": 25677417,
                    "href": "https://en.wikipedia.org/w/index.php?search=Algeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Algeria</span><br />Population : 25677417"
                    }
                },
                "DE": {
                    "value": 17767648,
                    "href": "https://en.wikipedia.org/w/index.php?search=Germany",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Germany</span><br />Population : 17767648"
                    }
                },
                "AD": {
                    "value": 8241925,
                    "href": "https://en.wikipedia.org/w/index.php?search=Andorra",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Andorra</span><br />Population : 8241925"
                    }
                },
                "AO": {
                    "value": 20995901,
                    "href": "https://en.wikipedia.org/w/index.php?search=Angola",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Angola</span><br />Population : 20995901"
                    }
                },
                "AG": {
                    "value": 10080896,
                    "href": "https://en.wikipedia.org/w/index.php?search=Antigua And Barbuda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Antigua And Barbuda</span><br />Population : 10080896"
                    }
                },
                "SA": {
                    "value": 43615610,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saudi Arabia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saudi Arabia</span><br />Population : 43615610"
                    }
                },
                "AR": {
                    "value": 44063471,
                    "href": "https://en.wikipedia.org/w/index.php?search=Argentina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Argentina</span><br />Population : 44063471"
                    }
                },
                "AM": {
                    "value": 50763102,
                    "href": "https://en.wikipedia.org/w/index.php?search=Armenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Armenia</span><br />Population : 50763102"
                    }
                },
                "AU": {
                    "value": 23849414,
                    "href": "https://en.wikipedia.org/w/index.php?search=Australia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Australia</span><br />Population : 23849414"
                    }
                },
                "AT": {
                    "value": 35652829,
                    "href": "https://en.wikipedia.org/w/index.php?search=Austria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Austria</span><br />Population : 35652829"
                    }
                },
                "AZ": {
                    "value": 48414118,
                    "href": "https://en.wikipedia.org/w/index.php?search=Azerbaijan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Azerbaijan</span><br />Population : 48414118"
                    }
                },
                "BS": {
                    "value": 4602371,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahamas",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahamas</span><br />Population : 4602371"
                    }
                },
                "BH": {
                    "value": 27673596,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahrain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahrain</span><br />Population : 27673596"
                    }
                },
                "BD": {
                    "value": 21957431,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bangladesh",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bangladesh</span><br />Population : 21957431"
                    }
                },
                "BB": {
                    "value": 26909491,
                    "href": "https://en.wikipedia.org/w/index.php?search=Barbados",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Barbados</span><br />Population : 26909491"
                    }
                },
                "BE": {
                    "value": 15416836,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belgium",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belgium</span><br />Population : 15416836"
                    }
                },
                "BZ": {
                    "value": 12194067,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belize",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belize</span><br />Population : 12194067"
                    }
                },
                "BJ": {
                    "value": 657540,
                    "href": "https://en.wikipedia.org/w/index.php?search=Benin",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Benin</span><br />Population : 657540"
                    }
                },
                "BT": {
                    "value": 15115216,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bhutan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bhutan</span><br />Population : 15115216"
                    }
                },
                "BY": {
                    "value": 6459622,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belarus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belarus</span><br />Population : 6459622"
                    }
                },
                "MM": {
                    "value": 57901453,
                    "href": "https://en.wikipedia.org/w/index.php?search=Myanmar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Myanmar</span><br />Population : 57901453"
                    }
                },
                "BO": {
                    "value": 59731284,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bolivia, Plurinational State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bolivia, Plurinational State Of</span><br />Population : 59731284"
                    }
                },
                "BA": {
                    "value": 18646918,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bosnia And Herzegovina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bosnia And Herzegovina</span><br />Population : 18646918"
                    }
                },
                "BW": {
                    "value": 50733853,
                    "href": "https://en.wikipedia.org/w/index.php?search=Botswana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Botswana</span><br />Population : 50733853"
                    }
                },
                "BR": {
                    "value": 35636377,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brazil",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brazil</span><br />Population : 35636377"
                    }
                },
                "BN": {
                    "value": 17606784,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brunei Darussalam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brunei Darussalam</span><br />Population : 17606784"
                    }
                },
                "BG": {
                    "value": 13170221,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bulgaria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bulgaria</span><br />Population : 13170221"
                    }
                },
                "BF": {
                    "value": 11592654,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burkina Faso",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burkina Faso</span><br />Population : 11592654"
                    }
                },
                "BI": {
                    "value": 25889465,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burundi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burundi</span><br />Population : 25889465"
                    }
                },
                "KH": {
                    "value": 22162167,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cambodia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cambodia</span><br />Population : 22162167"
                    }
                },
                "CM": {
                    "value": 4300750,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cameroon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cameroon</span><br />Population : 4300750"
                    }
                },
                "CA": {
                    "value": 21939151,
                    "href": "https://en.wikipedia.org/w/index.php?search=Canada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Canada</span><br />Population : 21939151"
                    }
                },
                "CV": {
                    "value": 19301343,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cape Verde",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cape Verde</span><br />Population : 19301343"
                    }
                },
                "CF": {
                    "value": 11625558,
                    "href": "https://en.wikipedia.org/w/index.php?search=Central African Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Central African Republic</span><br />Population : 11625558"
                    }
                },
                "CL": {
                    "value": 27604132,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chile",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chile</span><br />Population : 27604132"
                    }
                },
                "CN": {
                    "value": 5026467,
                    "href": "https://en.wikipedia.org/w/index.php?search=China",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">China</span><br />Population : 5026467"
                    }
                },
                "CY": {
                    "value": 36462634,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cyprus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cyprus</span><br />Population : 36462634"
                    }
                },
                "CO": {
                    "value": 14075082,
                    "href": "https://en.wikipedia.org/w/index.php?search=Colombia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Colombia</span><br />Population : 14075082"
                    }
                },
                "KM": {
                    "value": 28795990,
                    "href": "https://en.wikipedia.org/w/index.php?search=Comoros",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Comoros</span><br />Population : 28795990"
                    }
                },
                "CG": {
                    "value": 33857730,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo</span><br />Population : 33857730"
                    }
                },
                "CD": {
                    "value": 8113964,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo, The Democratic Republic Of The",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo, The Democratic Republic Of The</span><br />Population : 8113964"
                    }
                },
                "KP": {
                    "value": 27638864,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Democratic People's Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Democratic People's Republic Of</span><br />Population : 27638864"
                    }
                },
                "KR": {
                    "value": 43441950,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Republic Of</span><br />Population : 43441950"
                    }
                },
                "CR": {
                    "value": 31686063,
                    "href": "https://en.wikipedia.org/w/index.php?search=Costa Rica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Costa Rica</span><br />Population : 31686063"
                    }
                },
                "CI": {
                    "value": 14745959,
                    "href": "https://en.wikipedia.org/w/index.php?search=C\u00d4te D'ivoire",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">C\u00d4te D'ivoire</span><br />Population : 14745959"
                    }
                },
                "HR": {
                    "value": 20495029,
                    "href": "https://en.wikipedia.org/w/index.php?search=Croatia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Croatia</span><br />Population : 20495029"
                    }
                },
                "CU": {
                    "value": 17257635,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cuba",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cuba</span><br />Population : 17257635"
                    }
                },
                "DK": {
                    "value": 11614590,
                    "href": "https://en.wikipedia.org/w/index.php?search=Denmark",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Denmark</span><br />Population : 11614590"
                    }
                },
                "DJ": {
                    "value": 46999243,
                    "href": "https://en.wikipedia.org/w/index.php?search=Djibouti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Djibouti</span><br />Population : 46999243"
                    }
                },
                "DM": {
                    "value": 50671701,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominica</span><br />Population : 50671701"
                    }
                },
                "EG": {
                    "value": 45708673,
                    "href": "https://en.wikipedia.org/w/index.php?search=Egypt",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Egypt</span><br />Population : 45708673"
                    }
                },
                "AE": {
                    "value": 16696438,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Arab Emirates",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Arab Emirates</span><br />Population : 16696438"
                    }
                },
                "EC": {
                    "value": 5664441,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ecuador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ecuador</span><br />Population : 5664441"
                    }
                },
                "ER": {
                    "value": 26447006,
                    "href": "https://en.wikipedia.org/w/index.php?search=Eritrea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Eritrea</span><br />Population : 26447006"
                    }
                },
                "ES": {
                    "value": 14610687,
                    "href": "https://en.wikipedia.org/w/index.php?search=Spain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Spain</span><br />Population : 14610687"
                    }
                },
                "EE": {
                    "value": 134732,
                    "href": "https://en.wikipedia.org/w/index.php?search=Estonia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Estonia</span><br />Population : 134732"
                    }
                },
                "US": {
                    "value": 1182177,
                    "href": "https://en.wikipedia.org/w/index.php?search=United States",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United States</span><br />Population : 1182177"
                    }
                },
                "ET": {
                    "value": 5849069,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ethiopia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ethiopia</span><br />Population : 5849069"
                    }
                },
                "FJ": {
                    "value": 19429303,
                    "href": "https://en.wikipedia.org/w/index.php?search=Fiji",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Fiji</span><br />Population : 19429303"
                    }
                },
                "FI": {
                    "value": 4982595,
                    "href": "https://en.wikipedia.org/w/index.php?search=Finland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Finland</span><br />Population : 4982595"
                    }
                },
                "FR": {
                    "value": 54143079,
                    "href": "https://en.wikipedia.org/w/index.php?search=France",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">France</span><br />Population : 54143079"
                    }
                },
                "GA": {
                    "value": 16956015,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gabon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gabon</span><br />Population : 16956015"
                    }
                },
                "GM": {
                    "value": 5880145,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gambia</span><br />Population : 5880145"
                    }
                },
                "GE": {
                    "value": 44343155,
                    "href": "https://en.wikipedia.org/w/index.php?search=Georgia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Georgia</span><br />Population : 44343155"
                    }
                },
                "GH": {
                    "value": 35387769,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ghana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ghana</span><br />Population : 35387769"
                    }
                },
                "GR": {
                    "value": 57895969,
                    "href": "https://en.wikipedia.org/w/index.php?search=Greece",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Greece</span><br />Population : 57895969"
                    }
                },
                "GD": {
                    "value": 9528839,
                    "href": "https://en.wikipedia.org/w/index.php?search=Grenada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Grenada</span><br />Population : 9528839"
                    }
                },
                "GT": {
                    "value": 41469534,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guatemala",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guatemala</span><br />Population : 41469534"
                    }
                },
                "GN": {
                    "value": 25406872,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea</span><br />Population : 25406872"
                    }
                },
                "GQ": {
                    "value": 36947055,
                    "href": "https://en.wikipedia.org/w/index.php?search=Equatorial Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Equatorial Guinea</span><br />Population : 36947055"
                    }
                },
                "GW": {
                    "value": 35991010,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea-bissau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea-bissau</span><br />Population : 35991010"
                    }
                },
                "GY": {
                    "value": 9464859,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guyana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guyana</span><br />Population : 9464859"
                    }
                },
                "HT": {
                    "value": 14841015,
                    "href": "https://en.wikipedia.org/w/index.php?search=Haiti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Haiti</span><br />Population : 14841015"
                    }
                },
                "HN": {
                    "value": 12137399,
                    "href": "https://en.wikipedia.org/w/index.php?search=Honduras",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Honduras</span><br />Population : 12137399"
                    }
                },
                "HU": {
                    "value": 1032281,
                    "href": "https://en.wikipedia.org/w/index.php?search=Hungary",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Hungary</span><br />Population : 1032281"
                    }
                },
                "JM": {
                    "value": 51282254,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jamaica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jamaica</span><br />Population : 51282254"
                    }
                },
                "JP": {
                    "value": 24280823,
                    "href": "https://en.wikipedia.org/w/index.php?search=Japan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Japan</span><br />Population : 24280823"
                    }
                },
                "MH": {
                    "value": 11545126,
                    "href": "https://en.wikipedia.org/w/index.php?search=Marshall Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Marshall Islands</span><br />Population : 11545126"
                    }
                },
                "PW": {
                    "value": 30068280,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palau</span><br />Population : 30068280"
                    }
                },
                "SB": {
                    "value": 324844,
                    "href": "https://en.wikipedia.org/w/index.php?search=Solomon Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Solomon Islands</span><br />Population : 324844"
                    }
                },
                "IN": {
                    "value": 44366919,
                    "href": "https://en.wikipedia.org/w/index.php?search=India",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">India</span><br />Population : 44366919"
                    }
                },
                "ID": {
                    "value": 33298361,
                    "href": "https://en.wikipedia.org/w/index.php?search=Indonesia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Indonesia</span><br />Population : 33298361"
                    }
                },
                "JO": {
                    "value": 38864630,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jordan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jordan</span><br />Population : 38864630"
                    }
                },
                "IR": {
                    "value": 19445755,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iran, Islamic Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iran, Islamic Republic Of</span><br />Population : 19445755"
                    }
                },
                "IQ": {
                    "value": 35789929,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iraq",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iraq</span><br />Population : 35789929"
                    }
                },
                "IE": {
                    "value": 45575229,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ireland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ireland</span><br />Population : 45575229"
                    }
                },
                "IS": {
                    "value": 33036957,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iceland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iceland</span><br />Population : 33036957"
                    }
                },
                "IL": {
                    "value": 1948110,
                    "href": "https://en.wikipedia.org/w/index.php?search=Israel",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Israel</span><br />Population : 1948110"
                    }
                },
                "IT": {
                    "value": 49090479,
                    "href": "https://en.wikipedia.org/w/index.php?search=Italy",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Italy</span><br />Population : 49090479"
                    }
                },
                "KZ": {
                    "value": 46503855,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kazakhstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kazakhstan</span><br />Population : 46503855"
                    }
                },
                "KE": {
                    "value": 48150885,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kenya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kenya</span><br />Population : 48150885"
                    }
                },
                "KG": {
                    "value": 50785038,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kyrgyzstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kyrgyzstan</span><br />Population : 50785038"
                    }
                },
                "KI": {
                    "value": 44959192,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kiribati",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kiribati</span><br />Population : 44959192"
                    }
                },
                "KW": {
                    "value": 4262362,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kuwait",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kuwait</span><br />Population : 4262362"
                    }
                },
                "LA": {
                    "value": 29922040,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lao People's Democratic Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lao People's Democratic Republic</span><br />Population : 29922040"
                    }
                },
                "LS": {
                    "value": 59259659,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lesotho",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lesotho</span><br />Population : 59259659"
                    }
                },
                "LV": {
                    "value": 14036694,
                    "href": "https://en.wikipedia.org/w/index.php?search=Latvia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Latvia</span><br />Population : 14036694"
                    }
                },
                "LB": {
                    "value": 36778879,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lebanon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lebanon</span><br />Population : 36778879"
                    }
                },
                "LR": {
                    "value": 13916046,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liberia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liberia</span><br />Population : 13916046"
                    }
                },
                "LY": {
                    "value": 10525100,
                    "href": "https://en.wikipedia.org/w/index.php?search=Libya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Libya</span><br />Population : 10525100"
                    }
                },
                "LI": {
                    "value": 36813611,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liechtenstein",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liechtenstein</span><br />Population : 36813611"
                    }
                },
                "LT": {
                    "value": 52331528,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lithuania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lithuania</span><br />Population : 52331528"
                    }
                },
                "LU": {
                    "value": 5748529,
                    "href": "https://en.wikipedia.org/w/index.php?search=Luxembourg",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Luxembourg</span><br />Population : 5748529"
                    }
                },
                "MK": {
                    "value": 37484488,
                    "href": "https://en.wikipedia.org/w/index.php?search=Macedonia, The Former Yugoslav Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Macedonia, The Former Yugoslav Republic Of</span><br />Population : 37484488"
                    }
                },
                "MG": {
                    "value": 44030567,
                    "href": "https://en.wikipedia.org/w/index.php?search=Madagascar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Madagascar</span><br />Population : 44030567"
                    }
                },
                "MY": {
                    "value": 49048435,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malaysia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malaysia</span><br />Population : 49048435"
                    }
                },
                "MW": {
                    "value": 40985114,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malawi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malawi</span><br />Population : 40985114"
                    }
                },
                "MV": {
                    "value": 3490945,
                    "href": "https://en.wikipedia.org/w/index.php?search=Maldives",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Maldives</span><br />Population : 3490945"
                    }
                },
                "ML": {
                    "value": 56278186,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mali",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mali</span><br />Population : 56278186"
                    }
                },
                "MT": {
                    "value": 55007724,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malta",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malta</span><br />Population : 55007724"
                    }
                },
                "MA": {
                    "value": 5441424,
                    "href": "https://en.wikipedia.org/w/index.php?search=Morocco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Morocco</span><br />Population : 5441424"
                    }
                },
                "MU": {
                    "value": 41447598,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritius",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritius</span><br />Population : 41447598"
                    }
                },
                "MR": {
                    "value": 4297094,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritania</span><br />Population : 4297094"
                    }
                },
                "MX": {
                    "value": 8437521,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mexico",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mexico</span><br />Population : 8437521"
                    }
                },
                "FM": {
                    "value": 54483088,
                    "href": "https://en.wikipedia.org/w/index.php?search=Micronesia, Federated States Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Micronesia, Federated States Of</span><br />Population : 54483088"
                    }
                },
                "MD": {
                    "value": 14707571,
                    "href": "https://en.wikipedia.org/w/index.php?search=Moldova, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Moldova, Republic Of</span><br />Population : 14707571"
                    }
                },
                "MC": {
                    "value": 28477917,
                    "href": "https://en.wikipedia.org/w/index.php?search=Monaco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Monaco</span><br />Population : 28477917"
                    }
                },
                "MN": {
                    "value": 57215952,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mongolia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mongolia</span><br />Population : 57215952"
                    }
                },
                "ME": {
                    "value": 14025726,
                    "href": "https://en.wikipedia.org/w/index.php?search=Montenegro",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Montenegro</span><br />Population : 14025726"
                    }
                },
                "MZ": {
                    "value": 56173990,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mozambique",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mozambique</span><br />Population : 56173990"
                    }
                },
                "NA": {
                    "value": 59561280,
                    "href": "https://en.wikipedia.org/w/index.php?search=Namibia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Namibia</span><br />Population : 59561280"
                    }
                },
                "NP": {
                    "value": 19771139,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nepal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nepal</span><br />Population : 19771139"
                    }
                },
                "NI": {
                    "value": 39434967,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nicaragua",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nicaragua</span><br />Population : 39434967"
                    }
                },
                "NE": {
                    "value": 29199979,
                    "href": "https://en.wikipedia.org/w/index.php?search=Niger",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Niger</span><br />Population : 29199979"
                    }
                },
                "NG": {
                    "value": 58237806,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nigeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nigeria</span><br />Population : 58237806"
                    }
                },
                "NO": {
                    "value": 43981211,
                    "href": "https://en.wikipedia.org/w/index.php?search=Norway",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Norway</span><br />Population : 43981211"
                    }
                },
                "NZ": {
                    "value": 16526434,
                    "href": "https://en.wikipedia.org/w/index.php?search=New Zealand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New Zealand</span><br />Population : 16526434"
                    }
                },
                "OM": {
                    "value": 6788662,
                    "href": "https://en.wikipedia.org/w/index.php?search=Oman",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Oman</span><br />Population : 6788662"
                    }
                },
                "UG": {
                    "value": 15148120,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uganda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uganda</span><br />Population : 15148120"
                    }
                },
                "UZ": {
                    "value": 8174289,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uzbekistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uzbekistan</span><br />Population : 8174289"
                    }
                },
                "PK": {
                    "value": 40765753,
                    "href": "https://en.wikipedia.org/w/index.php?search=Pakistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Pakistan</span><br />Population : 40765753"
                    }
                },
                "PS": {
                    "value": 31993167,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palestine, State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palestine, State Of</span><br />Population : 31993167"
                    }
                },
                "PA": {
                    "value": 10782849,
                    "href": "https://en.wikipedia.org/w/index.php?search=Panama",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Panama</span><br />Population : 10782849"
                    }
                },
                "PG": {
                    "value": 328500,
                    "href": "https://en.wikipedia.org/w/index.php?search=Papua New Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Papua New Guinea</span><br />Population : 328500"
                    }
                },
                "PY": {
                    "value": 57868549,
                    "href": "https://en.wikipedia.org/w/index.php?search=Paraguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paraguay</span><br />Population : 57868549"
                    }
                },
                "NL": {
                    "value": 58016617,
                    "href": "https://en.wikipedia.org/w/index.php?search=Netherlands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Netherlands</span><br />Population : 58016617"
                    }
                },
                "PE": {
                    "value": 35782617,
                    "href": "https://en.wikipedia.org/w/index.php?search=Peru",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Peru</span><br />Population : 35782617"
                    }
                },
                "PH": {
                    "value": 18571969,
                    "href": "https://en.wikipedia.org/w/index.php?search=Philippines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Philippines</span><br />Population : 18571969"
                    }
                },
                "PL": {
                    "value": 43500446,
                    "href": "https://en.wikipedia.org/w/index.php?search=Poland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Poland</span><br />Population : 43500446"
                    }
                },
                "PT": {
                    "value": 8112136,
                    "href": "https://en.wikipedia.org/w/index.php?search=Portugal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Portugal</span><br />Population : 8112136"
                    }
                },
                "QA": {
                    "value": 50838050,
                    "href": "https://en.wikipedia.org/w/index.php?search=Qatar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Qatar</span><br />Population : 50838050"
                    }
                },
                "DO": {
                    "value": 31082822,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominican Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominican Republic</span><br />Population : 31082822"
                    }
                },
                "RO": {
                    "value": 3277069,
                    "href": "https://en.wikipedia.org/w/index.php?search=Romania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Romania</span><br />Population : 3277069"
                    }
                },
                "GB": {
                    "value": 15182852,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Kingdom",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Kingdom</span><br />Population : 15182852"
                    }
                },
                "RU": {
                    "value": 46589771,
                    "href": "https://en.wikipedia.org/w/index.php?search=Russian Federation",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Russian Federation</span><br />Population : 46589771"
                    }
                },
                "RW": {
                    "value": 35989182,
                    "href": "https://en.wikipedia.org/w/index.php?search=Rwanda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Rwanda</span><br />Population : 35989182"
                    }
                },
                "KN": {
                    "value": 32664044,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Kitts And Nevis",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Kitts And Nevis</span><br />Population : 32664044"
                    }
                },
                "SM": {
                    "value": 2481887,
                    "href": "https://en.wikipedia.org/w/index.php?search=San Marino",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">San Marino</span><br />Population : 2481887"
                    }
                },
                "VC": {
                    "value": 43628406,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Vincent And The Grenadines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Vincent And The Grenadines</span><br />Population : 43628406"
                    }
                },
                "LC": {
                    "value": 1469174,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Lucia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Lucia</span><br />Population : 1469174"
                    }
                },
                "SV": {
                    "value": 17476996,
                    "href": "https://en.wikipedia.org/w/index.php?search=El Salvador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">El Salvador</span><br />Population : 17476996"
                    }
                },
                "WS": {
                    "value": 43012369,
                    "href": "https://en.wikipedia.org/w/index.php?search=Samoa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Samoa</span><br />Population : 43012369"
                    }
                },
                "ST": {
                    "value": 32594580,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sao Tome And Principe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sao Tome And Principe</span><br />Population : 32594580"
                    }
                },
                "SN": {
                    "value": 45450925,
                    "href": "https://en.wikipedia.org/w/index.php?search=Senegal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Senegal</span><br />Population : 45450925"
                    }
                },
                "RS": {
                    "value": 53181549,
                    "href": "https://en.wikipedia.org/w/index.php?search=Serbia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Serbia</span><br />Population : 53181549"
                    }
                },
                "SC": {
                    "value": 127420,
                    "href": "https://en.wikipedia.org/w/index.php?search=Seychelles",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Seychelles</span><br />Population : 127420"
                    }
                },
                "SL": {
                    "value": 34078919,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sierra Leone",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sierra Leone</span><br />Population : 34078919"
                    }
                },
                "SG": {
                    "value": 16312558,
                    "href": "https://en.wikipedia.org/w/index.php?search=Singapore",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Singapore</span><br />Population : 16312558"
                    }
                },
                "SK": {
                    "value": 25593329,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovakia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovakia</span><br />Population : 25593329"
                    }
                },
                "SI": {
                    "value": 6730166,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovenia</span><br />Population : 6730166"
                    }
                },
                "SO": {
                    "value": 38722046,
                    "href": "https://en.wikipedia.org/w/index.php?search=Somalia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Somalia</span><br />Population : 38722046"
                    }
                },
                "SD": {
                    "value": 31982199,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sudan</span><br />Population : 31982199"
                    }
                },
                "SS": {
                    "value": 30177960,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Sudan</span><br />Population : 30177960"
                    }
                },
                "LK": {
                    "value": 45973734,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sri Lanka",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sri Lanka</span><br />Population : 45973734"
                    }
                },
                "SE": {
                    "value": 7214587,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sweden",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sweden</span><br />Population : 7214587"
                    }
                },
                "CH": {
                    "value": 737973,
                    "href": "https://en.wikipedia.org/w/index.php?search=Switzerland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Switzerland</span><br />Population : 737973"
                    }
                },
                "SR": {
                    "value": 12651068,
                    "href": "https://en.wikipedia.org/w/index.php?search=Suriname",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Suriname</span><br />Population : 12651068"
                    }
                },
                "SZ": {
                    "value": 11161245,
                    "href": "https://en.wikipedia.org/w/index.php?search=Swaziland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Swaziland</span><br />Population : 11161245"
                    }
                },
                "SY": {
                    "value": 49997168,
                    "href": "https://en.wikipedia.org/w/index.php?search=Syrian Arab Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Syrian Arab Republic</span><br />Population : 49997168"
                    }
                },
                "TJ": {
                    "value": 40508005,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tajikistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tajikistan</span><br />Population : 40508005"
                    }
                },
                "TZ": {
                    "value": 8578277,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tanzania, United Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tanzania, United Republic Of</span><br />Population : 8578277"
                    }
                },
                "TD": {
                    "value": 5245828,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chad",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chad</span><br />Population : 5245828"
                    }
                },
                "CZ": {
                    "value": 7960412,
                    "href": "https://en.wikipedia.org/w/index.php?search=Czech Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Czech Republic</span><br />Population : 7960412"
                    }
                },
                "TH": {
                    "value": 59570420,
                    "href": "https://en.wikipedia.org/w/index.php?search=Thailand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Thailand</span><br />Population : 59570420"
                    }
                },
                "TL": {
                    "value": 23575214,
                    "href": "https://en.wikipedia.org/w/index.php?search=Timor-leste",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Timor-leste</span><br />Population : 23575214"
                    }
                },
                "TG": {
                    "value": 41330606,
                    "href": "https://en.wikipedia.org/w/index.php?search=Togo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Togo</span><br />Population : 41330606"
                    }
                },
                "TO": {
                    "value": 51444947,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tonga",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tonga</span><br />Population : 51444947"
                    }
                },
                "TT": {
                    "value": 56053342,
                    "href": "https://en.wikipedia.org/w/index.php?search=Trinidad And Tobago",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Trinidad And Tobago</span><br />Population : 56053342"
                    }
                },
                "TN": {
                    "value": 33307501,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tunisia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tunisia</span><br />Population : 33307501"
                    }
                },
                "TM": {
                    "value": 42668704,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkmenistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkmenistan</span><br />Population : 42668704"
                    }
                },
                "TR": {
                    "value": 21341394,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkey",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkey</span><br />Population : 21341394"
                    }
                },
                "TV": {
                    "value": 58034897,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tuvalu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tuvalu</span><br />Population : 58034897"
                    }
                },
                "VU": {
                    "value": 43390766,
                    "href": "https://en.wikipedia.org/w/index.php?search=Vanuatu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Vanuatu</span><br />Population : 43390766"
                    }
                },
                "VE": {
                    "value": 22363248,
                    "href": "https://en.wikipedia.org/w/index.php?search=Venezuela, Bolivarian Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Venezuela, Bolivarian Republic Of</span><br />Population : 22363248"
                    }
                },
                "VN": {
                    "value": 28090381,
                    "href": "https://en.wikipedia.org/w/index.php?search=Viet Nam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Viet Nam</span><br />Population : 28090381"
                    }
                },
                "UA": {
                    "value": 3743209,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ukraine",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ukraine</span><br />Population : 3743209"
                    }
                },
                "UY": {
                    "value": 29490631,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uruguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uruguay</span><br />Population : 29490631"
                    }
                },
                "YE": {
                    "value": 23467361,
                    "href": "https://en.wikipedia.org/w/index.php?search=Yemen",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Yemen</span><br />Population : 23467361"
                    }
                },
                "ZM": {
                    "value": 32382532,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zambia</span><br />Population : 32382532"
                    }
                },
                "ZW": {
                    "value": 41056406,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zimbabwe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zimbabwe</span><br />Population : 41056406"
                    }
                }
            },
            "plots": {
                "paris": {
                    "value": 1432752,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paris</span><br />Population: 1432752"
                    }
                },
                "newyork": {
                    "value": 1478595,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New-York</span><br />Population: 1478595"
                    }
                },
                "sydney": {
                    "value": 678662,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sydney</span><br />Population: 678662"
                    }
                },
                "brasilia": {
                    "value": 1226606,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brasilia</span><br />Population: 1226606"
                    }
                },
                "tokyo": {
                    "value": 1080530,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tokyo</span><br />Population: 1080530"
                    }
                }
            }
        },
        "2009": {
            "areas": {
                "AF": {
                    "value": 52466800,
                    "href": "https://en.wikipedia.org/w/index.php?search=Afghanistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Afghanistan</span><br />Population : 52466800"
                    }
                },
                "ZA": {
                    "value": 26108826,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Africa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Africa</span><br />Population : 26108826"
                    }
                },
                "AL": {
                    "value": 53559946,
                    "href": "https://en.wikipedia.org/w/index.php?search=Albania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Albania</span><br />Population : 53559946"
                    }
                },
                "DZ": {
                    "value": 49796088,
                    "href": "https://en.wikipedia.org/w/index.php?search=Algeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Algeria</span><br />Population : 49796088"
                    }
                },
                "DE": {
                    "value": 16718374,
                    "href": "https://en.wikipedia.org/w/index.php?search=Germany",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Germany</span><br />Population : 16718374"
                    }
                },
                "AD": {
                    "value": 26774219,
                    "href": "https://en.wikipedia.org/w/index.php?search=Andorra",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Andorra</span><br />Population : 26774219"
                    }
                },
                "AO": {
                    "value": 54956540,
                    "href": "https://en.wikipedia.org/w/index.php?search=Angola",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Angola</span><br />Population : 54956540"
                    }
                },
                "AG": {
                    "value": 56018610,
                    "href": "https://en.wikipedia.org/w/index.php?search=Antigua And Barbuda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Antigua And Barbuda</span><br />Population : 56018610"
                    }
                },
                "SA": {
                    "value": 54792020,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saudi Arabia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saudi Arabia</span><br />Population : 54792020"
                    }
                },
                "AR": {
                    "value": 47445276,
                    "href": "https://en.wikipedia.org/w/index.php?search=Argentina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Argentina</span><br />Population : 47445276"
                    }
                },
                "AM": {
                    "value": 20670517,
                    "href": "https://en.wikipedia.org/w/index.php?search=Armenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Armenia</span><br />Population : 20670517"
                    }
                },
                "AU": {
                    "value": 6435858,
                    "href": "https://en.wikipedia.org/w/index.php?search=Australia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Australia</span><br />Population : 6435858"
                    }
                },
                "AT": {
                    "value": 59990860,
                    "href": "https://en.wikipedia.org/w/index.php?search=Austria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Austria</span><br />Population : 59990860"
                    }
                },
                "AZ": {
                    "value": 18862622,
                    "href": "https://en.wikipedia.org/w/index.php?search=Azerbaijan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Azerbaijan</span><br />Population : 18862622"
                    }
                },
                "BS": {
                    "value": 8730001,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahamas",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahamas</span><br />Population : 8730001"
                    }
                },
                "BH": {
                    "value": 56413459,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahrain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahrain</span><br />Population : 56413459"
                    }
                },
                "BD": {
                    "value": 15468020,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bangladesh",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bangladesh</span><br />Population : 15468020"
                    }
                },
                "BB": {
                    "value": 21516882,
                    "href": "https://en.wikipedia.org/w/index.php?search=Barbados",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Barbados</span><br />Population : 21516882"
                    }
                },
                "BE": {
                    "value": 47213120,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belgium",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belgium</span><br />Population : 47213120"
                    }
                },
                "BZ": {
                    "value": 31867035,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belize",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belize</span><br />Population : 31867035"
                    }
                },
                "BJ": {
                    "value": 54126627,
                    "href": "https://en.wikipedia.org/w/index.php?search=Benin",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Benin</span><br />Population : 54126627"
                    }
                },
                "BT": {
                    "value": 46048682,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bhutan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bhutan</span><br />Population : 46048682"
                    }
                },
                "BY": {
                    "value": 14447995,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belarus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belarus</span><br />Population : 14447995"
                    }
                },
                "MM": {
                    "value": 28262213,
                    "href": "https://en.wikipedia.org/w/index.php?search=Myanmar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Myanmar</span><br />Population : 28262213"
                    }
                },
                "BO": {
                    "value": 39319803,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bolivia, Plurinational State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bolivia, Plurinational State Of</span><br />Population : 39319803"
                    }
                },
                "BA": {
                    "value": 53148645,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bosnia And Herzegovina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bosnia And Herzegovina</span><br />Population : 53148645"
                    }
                },
                "BW": {
                    "value": 58312754,
                    "href": "https://en.wikipedia.org/w/index.php?search=Botswana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Botswana</span><br />Population : 58312754"
                    }
                },
                "BR": {
                    "value": 51214618,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brazil",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brazil</span><br />Population : 51214618"
                    }
                },
                "BN": {
                    "value": 44050675,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brunei Darussalam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brunei Darussalam</span><br />Population : 44050675"
                    }
                },
                "BG": {
                    "value": 33457398,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bulgaria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bulgaria</span><br />Population : 33457398"
                    }
                },
                "BF": {
                    "value": 57135520,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burkina Faso",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burkina Faso</span><br />Population : 57135520"
                    }
                },
                "BI": {
                    "value": 16489874,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burundi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burundi</span><br />Population : 16489874"
                    }
                },
                "KH": {
                    "value": 51472367,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cambodia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cambodia</span><br />Population : 51472367"
                    }
                },
                "CM": {
                    "value": 7565564,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cameroon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cameroon</span><br />Population : 7565564"
                    }
                },
                "CA": {
                    "value": 38994418,
                    "href": "https://en.wikipedia.org/w/index.php?search=Canada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Canada</span><br />Population : 38994418"
                    }
                },
                "CV": {
                    "value": 49503608,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cape Verde",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cape Verde</span><br />Population : 49503608"
                    }
                },
                "CF": {
                    "value": 14788003,
                    "href": "https://en.wikipedia.org/w/index.php?search=Central African Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Central African Republic</span><br />Population : 14788003"
                    }
                },
                "CL": {
                    "value": 26013769,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chile",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chile</span><br />Population : 26013769"
                    }
                },
                "CN": {
                    "value": 2017575,
                    "href": "https://en.wikipedia.org/w/index.php?search=China",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">China</span><br />Population : 2017575"
                    }
                },
                "CY": {
                    "value": 6121441,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cyprus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cyprus</span><br />Population : 6121441"
                    }
                },
                "CO": {
                    "value": 36950711,
                    "href": "https://en.wikipedia.org/w/index.php?search=Colombia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Colombia</span><br />Population : 36950711"
                    }
                },
                "KM": {
                    "value": 49492639,
                    "href": "https://en.wikipedia.org/w/index.php?search=Comoros",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Comoros</span><br />Population : 49492639"
                    }
                },
                "CG": {
                    "value": 34183115,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo</span><br />Population : 34183115"
                    }
                },
                "CD": {
                    "value": 11759002,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo, The Democratic Republic Of The",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo, The Democratic Republic Of The</span><br />Population : 11759002"
                    }
                },
                "KP": {
                    "value": 11263614,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Democratic People's Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Democratic People's Republic Of</span><br />Population : 11263614"
                    }
                },
                "KR": {
                    "value": 8742797,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Republic Of</span><br />Population : 8742797"
                    }
                },
                "CR": {
                    "value": 13819162,
                    "href": "https://en.wikipedia.org/w/index.php?search=Costa Rica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Costa Rica</span><br />Population : 13819162"
                    }
                },
                "CI": {
                    "value": 42081915,
                    "href": "https://en.wikipedia.org/w/index.php?search=C\u00d4te D'ivoire",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">C\u00d4te D'ivoire</span><br />Population : 42081915"
                    }
                },
                "HR": {
                    "value": 40679837,
                    "href": "https://en.wikipedia.org/w/index.php?search=Croatia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Croatia</span><br />Population : 40679837"
                    }
                },
                "CU": {
                    "value": 44154871,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cuba",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cuba</span><br />Population : 44154871"
                    }
                },
                "DK": {
                    "value": 28903842,
                    "href": "https://en.wikipedia.org/w/index.php?search=Denmark",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Denmark</span><br />Population : 28903842"
                    }
                },
                "DJ": {
                    "value": 42805805,
                    "href": "https://en.wikipedia.org/w/index.php?search=Djibouti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Djibouti</span><br />Population : 42805805"
                    }
                },
                "DM": {
                    "value": 18502505,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominica</span><br />Population : 18502505"
                    }
                },
                "EG": {
                    "value": 26569482,
                    "href": "https://en.wikipedia.org/w/index.php?search=Egypt",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Egypt</span><br />Population : 26569482"
                    }
                },
                "AE": {
                    "value": 17665280,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Arab Emirates",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Arab Emirates</span><br />Population : 17665280"
                    }
                },
                "EC": {
                    "value": 49496295,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ecuador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ecuador</span><br />Population : 49496295"
                    }
                },
                "ER": {
                    "value": 47684745,
                    "href": "https://en.wikipedia.org/w/index.php?search=Eritrea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Eritrea</span><br />Population : 47684745"
                    }
                },
                "ES": {
                    "value": 36477258,
                    "href": "https://en.wikipedia.org/w/index.php?search=Spain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Spain</span><br />Population : 36477258"
                    }
                },
                "EE": {
                    "value": 8181601,
                    "href": "https://en.wikipedia.org/w/index.php?search=Estonia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Estonia</span><br />Population : 8181601"
                    }
                },
                "US": {
                    "value": 7869012,
                    "href": "https://en.wikipedia.org/w/index.php?search=United States",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United States</span><br />Population : 7869012"
                    }
                },
                "ET": {
                    "value": 21529678,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ethiopia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ethiopia</span><br />Population : 21529678"
                    }
                },
                "FJ": {
                    "value": 4618823,
                    "href": "https://en.wikipedia.org/w/index.php?search=Fiji",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Fiji</span><br />Population : 4618823"
                    }
                },
                "FI": {
                    "value": 58480930,
                    "href": "https://en.wikipedia.org/w/index.php?search=Finland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Finland</span><br />Population : 58480930"
                    }
                },
                "FR": {
                    "value": 13389581,
                    "href": "https://en.wikipedia.org/w/index.php?search=France",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">France</span><br />Population : 13389581"
                    }
                },
                "GA": {
                    "value": 42990433,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gabon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gabon</span><br />Population : 42990433"
                    }
                },
                "GM": {
                    "value": 11484802,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gambia</span><br />Population : 11484802"
                    }
                },
                "GE": {
                    "value": 16941391,
                    "href": "https://en.wikipedia.org/w/index.php?search=Georgia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Georgia</span><br />Population : 16941391"
                    }
                },
                "GH": {
                    "value": 11773626,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ghana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ghana</span><br />Population : 11773626"
                    }
                },
                "GR": {
                    "value": 5370132,
                    "href": "https://en.wikipedia.org/w/index.php?search=Greece",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Greece</span><br />Population : 5370132"
                    }
                },
                "GD": {
                    "value": 47715821,
                    "href": "https://en.wikipedia.org/w/index.php?search=Grenada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Grenada</span><br />Population : 47715821"
                    }
                },
                "GT": {
                    "value": 1491110,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guatemala",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guatemala</span><br />Population : 1491110"
                    }
                },
                "GN": {
                    "value": 38586774,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea</span><br />Population : 38586774"
                    }
                },
                "GQ": {
                    "value": 11621902,
                    "href": "https://en.wikipedia.org/w/index.php?search=Equatorial Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Equatorial Guinea</span><br />Population : 11621902"
                    }
                },
                "GW": {
                    "value": 14102502,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea-bissau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea-bissau</span><br />Population : 14102502"
                    }
                },
                "GY": {
                    "value": 40208212,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guyana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guyana</span><br />Population : 40208212"
                    }
                },
                "HT": {
                    "value": 39544647,
                    "href": "https://en.wikipedia.org/w/index.php?search=Haiti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Haiti</span><br />Population : 39544647"
                    }
                },
                "HN": {
                    "value": 14948868,
                    "href": "https://en.wikipedia.org/w/index.php?search=Honduras",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Honduras</span><br />Population : 14948868"
                    }
                },
                "HU": {
                    "value": 21085473,
                    "href": "https://en.wikipedia.org/w/index.php?search=Hungary",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Hungary</span><br />Population : 21085473"
                    }
                },
                "JM": {
                    "value": 11420822,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jamaica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jamaica</span><br />Population : 11420822"
                    }
                },
                "JP": {
                    "value": 50212873,
                    "href": "https://en.wikipedia.org/w/index.php?search=Japan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Japan</span><br />Population : 50212873"
                    }
                },
                "MH": {
                    "value": 58404154,
                    "href": "https://en.wikipedia.org/w/index.php?search=Marshall Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Marshall Islands</span><br />Population : 58404154"
                    }
                },
                "PW": {
                    "value": 29355359,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palau</span><br />Population : 29355359"
                    }
                },
                "SB": {
                    "value": 3107064,
                    "href": "https://en.wikipedia.org/w/index.php?search=Solomon Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Solomon Islands</span><br />Population : 3107064"
                    }
                },
                "IN": {
                    "value": 16307074,
                    "href": "https://en.wikipedia.org/w/index.php?search=India",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">India</span><br />Population : 16307074"
                    }
                },
                "ID": {
                    "value": 35290884,
                    "href": "https://en.wikipedia.org/w/index.php?search=Indonesia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Indonesia</span><br />Population : 35290884"
                    }
                },
                "JO": {
                    "value": 29552783,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jordan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jordan</span><br />Population : 29552783"
                    }
                },
                "IR": {
                    "value": 13395065,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iran, Islamic Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iran, Islamic Republic Of</span><br />Population : 13395065"
                    }
                },
                "IQ": {
                    "value": 33292877,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iraq",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iraq</span><br />Population : 33292877"
                    }
                },
                "IE": {
                    "value": 48562186,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ireland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ireland</span><br />Population : 48562186"
                    }
                },
                "IS": {
                    "value": 42268372,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iceland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iceland</span><br />Population : 42268372"
                    }
                },
                "IL": {
                    "value": 10462948,
                    "href": "https://en.wikipedia.org/w/index.php?search=Israel",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Israel</span><br />Population : 10462948"
                    }
                },
                "IT": {
                    "value": 46885907,
                    "href": "https://en.wikipedia.org/w/index.php?search=Italy",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Italy</span><br />Population : 46885907"
                    }
                },
                "KZ": {
                    "value": 51421183,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kazakhstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kazakhstan</span><br />Population : 51421183"
                    }
                },
                "KE": {
                    "value": 58142749,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kenya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kenya</span><br />Population : 58142749"
                    }
                },
                "KG": {
                    "value": 52338840,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kyrgyzstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kyrgyzstan</span><br />Population : 52338840"
                    }
                },
                "KI": {
                    "value": 32751788,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kiribati",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kiribati</span><br />Population : 32751788"
                    }
                },
                "KW": {
                    "value": 27020999,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kuwait",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kuwait</span><br />Population : 27020999"
                    }
                },
                "LA": {
                    "value": 37866541,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lao People's Democratic Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lao People's Democratic Republic</span><br />Population : 37866541"
                    }
                },
                "LS": {
                    "value": 47300864,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lesotho",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lesotho</span><br />Population : 47300864"
                    }
                },
                "LV": {
                    "value": 56406147,
                    "href": "https://en.wikipedia.org/w/index.php?search=Latvia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Latvia</span><br />Population : 56406147"
                    }
                },
                "LB": {
                    "value": 48364762,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lebanon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lebanon</span><br />Population : 48364762"
                    }
                },
                "LR": {
                    "value": 31980371,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liberia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liberia</span><br />Population : 31980371"
                    }
                },
                "LY": {
                    "value": 53377146,
                    "href": "https://en.wikipedia.org/w/index.php?search=Libya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Libya</span><br />Population : 53377146"
                    }
                },
                "LI": {
                    "value": 33614606,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liechtenstein",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liechtenstein</span><br />Population : 33614606"
                    }
                },
                "LT": {
                    "value": 38705594,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lithuania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lithuania</span><br />Population : 38705594"
                    }
                },
                "LU": {
                    "value": 1174865,
                    "href": "https://en.wikipedia.org/w/index.php?search=Luxembourg",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Luxembourg</span><br />Population : 1174865"
                    }
                },
                "MK": {
                    "value": 38745810,
                    "href": "https://en.wikipedia.org/w/index.php?search=Macedonia, The Former Yugoslav Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Macedonia, The Former Yugoslav Republic Of</span><br />Population : 38745810"
                    }
                },
                "MG": {
                    "value": 29892792,
                    "href": "https://en.wikipedia.org/w/index.php?search=Madagascar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Madagascar</span><br />Population : 29892792"
                    }
                },
                "MY": {
                    "value": 11146621,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malaysia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malaysia</span><br />Population : 11146621"
                    }
                },
                "MW": {
                    "value": 55890650,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malawi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malawi</span><br />Population : 55890650"
                    }
                },
                "MV": {
                    "value": 1534982,
                    "href": "https://en.wikipedia.org/w/index.php?search=Maldives",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Maldives</span><br />Population : 1534982"
                    }
                },
                "ML": {
                    "value": 20906329,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mali",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mali</span><br />Population : 20906329"
                    }
                },
                "MT": {
                    "value": 8740969,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malta",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malta</span><br />Population : 8740969"
                    }
                },
                "MA": {
                    "value": 37018347,
                    "href": "https://en.wikipedia.org/w/index.php?search=Morocco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Morocco</span><br />Population : 37018347"
                    }
                },
                "MU": {
                    "value": 29722787,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritius",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritius</span><br />Population : 29722787"
                    }
                },
                "MR": {
                    "value": 12270843,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritania</span><br />Population : 12270843"
                    }
                },
                "MX": {
                    "value": 44591764,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mexico",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mexico</span><br />Population : 44591764"
                    }
                },
                "FM": {
                    "value": 54998584,
                    "href": "https://en.wikipedia.org/w/index.php?search=Micronesia, Federated States Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Micronesia, Federated States Of</span><br />Population : 54998584"
                    }
                },
                "MD": {
                    "value": 1637350,
                    "href": "https://en.wikipedia.org/w/index.php?search=Moldova, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Moldova, Republic Of</span><br />Population : 1637350"
                    }
                },
                "MC": {
                    "value": 39551959,
                    "href": "https://en.wikipedia.org/w/index.php?search=Monaco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Monaco</span><br />Population : 39551959"
                    }
                },
                "MN": {
                    "value": 41952127,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mongolia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mongolia</span><br />Population : 41952127"
                    }
                },
                "ME": {
                    "value": 10621985,
                    "href": "https://en.wikipedia.org/w/index.php?search=Montenegro",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Montenegro</span><br />Population : 10621985"
                    }
                },
                "MZ": {
                    "value": 5256796,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mozambique",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mozambique</span><br />Population : 5256796"
                    }
                },
                "NA": {
                    "value": 48465302,
                    "href": "https://en.wikipedia.org/w/index.php?search=Namibia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Namibia</span><br />Population : 48465302"
                    }
                },
                "NP": {
                    "value": 13925186,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nepal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nepal</span><br />Population : 13925186"
                    }
                },
                "NI": {
                    "value": 14329175,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nicaragua",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nicaragua</span><br />Population : 14329175"
                    }
                },
                "NE": {
                    "value": 38709250,
                    "href": "https://en.wikipedia.org/w/index.php?search=Niger",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Niger</span><br />Population : 38709250"
                    }
                },
                "NG": {
                    "value": 14676495,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nigeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nigeria</span><br />Population : 14676495"
                    }
                },
                "NO": {
                    "value": 3564065,
                    "href": "https://en.wikipedia.org/w/index.php?search=Norway",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Norway</span><br />Population : 3564065"
                    }
                },
                "NZ": {
                    "value": 26810779,
                    "href": "https://en.wikipedia.org/w/index.php?search=New Zealand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New Zealand</span><br />Population : 26810779"
                    }
                },
                "OM": {
                    "value": 10272836,
                    "href": "https://en.wikipedia.org/w/index.php?search=Oman",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Oman</span><br />Population : 10272836"
                    }
                },
                "UG": {
                    "value": 3701165,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uganda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uganda</span><br />Population : 3701165"
                    }
                },
                "UZ": {
                    "value": 23971890,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uzbekistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uzbekistan</span><br />Population : 23971890"
                    }
                },
                "PK": {
                    "value": 38707422,
                    "href": "https://en.wikipedia.org/w/index.php?search=Pakistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Pakistan</span><br />Population : 38707422"
                    }
                },
                "PS": {
                    "value": 37875681,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palestine, State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palestine, State Of</span><br />Population : 37875681"
                    }
                },
                "PA": {
                    "value": 51104938,
                    "href": "https://en.wikipedia.org/w/index.php?search=Panama",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Panama</span><br />Population : 51104938"
                    }
                },
                "PG": {
                    "value": 58301786,
                    "href": "https://en.wikipedia.org/w/index.php?search=Papua New Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Papua New Guinea</span><br />Population : 58301786"
                    }
                },
                "PY": {
                    "value": 10709729,
                    "href": "https://en.wikipedia.org/w/index.php?search=Paraguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paraguay</span><br />Population : 10709729"
                    }
                },
                "NL": {
                    "value": 29795908,
                    "href": "https://en.wikipedia.org/w/index.php?search=Netherlands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Netherlands</span><br />Population : 29795908"
                    }
                },
                "PE": {
                    "value": 42703436,
                    "href": "https://en.wikipedia.org/w/index.php?search=Peru",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Peru</span><br />Population : 42703436"
                    }
                },
                "PH": {
                    "value": 59756876,
                    "href": "https://en.wikipedia.org/w/index.php?search=Philippines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Philippines</span><br />Population : 59756876"
                    }
                },
                "PL": {
                    "value": 53258326,
                    "href": "https://en.wikipedia.org/w/index.php?search=Poland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Poland</span><br />Population : 53258326"
                    }
                },
                "PT": {
                    "value": 44061643,
                    "href": "https://en.wikipedia.org/w/index.php?search=Portugal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Portugal</span><br />Population : 44061643"
                    }
                },
                "QA": {
                    "value": 14062286,
                    "href": "https://en.wikipedia.org/w/index.php?search=Qatar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Qatar</span><br />Population : 14062286"
                    }
                },
                "DO": {
                    "value": 11490286,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominican Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominican Republic</span><br />Population : 11490286"
                    }
                },
                "RO": {
                    "value": 7243835,
                    "href": "https://en.wikipedia.org/w/index.php?search=Romania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Romania</span><br />Population : 7243835"
                    }
                },
                "GB": {
                    "value": 48851010,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Kingdom",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Kingdom</span><br />Population : 48851010"
                    }
                },
                "RU": {
                    "value": 30697113,
                    "href": "https://en.wikipedia.org/w/index.php?search=Russian Federation",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Russian Federation</span><br />Population : 30697113"
                    }
                },
                "RW": {
                    "value": 46405142,
                    "href": "https://en.wikipedia.org/w/index.php?search=Rwanda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Rwanda</span><br />Population : 46405142"
                    }
                },
                "KN": {
                    "value": 43006885,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Kitts And Nevis",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Kitts And Nevis</span><br />Population : 43006885"
                    }
                },
                "SM": {
                    "value": 42292136,
                    "href": "https://en.wikipedia.org/w/index.php?search=San Marino",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">San Marino</span><br />Population : 42292136"
                    }
                },
                "VC": {
                    "value": 8373541,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Vincent And The Grenadines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Vincent And The Grenadines</span><br />Population : 8373541"
                    }
                },
                "LC": {
                    "value": 27854568,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Lucia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Lucia</span><br />Population : 27854568"
                    }
                },
                "SV": {
                    "value": 1438098,
                    "href": "https://en.wikipedia.org/w/index.php?search=El Salvador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">El Salvador</span><br />Population : 1438098"
                    }
                },
                "WS": {
                    "value": 52463144,
                    "href": "https://en.wikipedia.org/w/index.php?search=Samoa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Samoa</span><br />Population : 52463144"
                    }
                },
                "ST": {
                    "value": 12607196,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sao Tome And Principe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sao Tome And Principe</span><br />Population : 12607196"
                    }
                },
                "SN": {
                    "value": 28841690,
                    "href": "https://en.wikipedia.org/w/index.php?search=Senegal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Senegal</span><br />Population : 28841690"
                    }
                },
                "RS": {
                    "value": 52878101,
                    "href": "https://en.wikipedia.org/w/index.php?search=Serbia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Serbia</span><br />Population : 52878101"
                    }
                },
                "SC": {
                    "value": 17592160,
                    "href": "https://en.wikipedia.org/w/index.php?search=Seychelles",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Seychelles</span><br />Population : 17592160"
                    }
                },
                "SL": {
                    "value": 19063702,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sierra Leone",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sierra Leone</span><br />Population : 19063702"
                    }
                },
                "SG": {
                    "value": 32519632,
                    "href": "https://en.wikipedia.org/w/index.php?search=Singapore",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Singapore</span><br />Population : 32519632"
                    }
                },
                "SK": {
                    "value": 38217517,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovakia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovakia</span><br />Population : 38217517"
                    }
                },
                "SI": {
                    "value": 25657309,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovenia</span><br />Population : 25657309"
                    }
                },
                "SO": {
                    "value": 33358685,
                    "href": "https://en.wikipedia.org/w/index.php?search=Somalia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Somalia</span><br />Population : 33358685"
                    }
                },
                "SD": {
                    "value": 51991520,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sudan</span><br />Population : 51991520"
                    }
                },
                "SS": {
                    "value": 7996972,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Sudan</span><br />Population : 7996972"
                    }
                },
                "LK": {
                    "value": 14886715,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sri Lanka",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sri Lanka</span><br />Population : 14886715"
                    }
                },
                "SE": {
                    "value": 31157770,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sweden",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sweden</span><br />Population : 31157770"
                    }
                },
                "CH": {
                    "value": 10510476,
                    "href": "https://en.wikipedia.org/w/index.php?search=Switzerland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Switzerland</span><br />Population : 10510476"
                    }
                },
                "SR": {
                    "value": 42707092,
                    "href": "https://en.wikipedia.org/w/index.php?search=Suriname",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Suriname</span><br />Population : 42707092"
                    }
                },
                "SZ": {
                    "value": 13358505,
                    "href": "https://en.wikipedia.org/w/index.php?search=Swaziland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Swaziland</span><br />Population : 13358505"
                    }
                },
                "SY": {
                    "value": 18076581,
                    "href": "https://en.wikipedia.org/w/index.php?search=Syrian Arab Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Syrian Arab Republic</span><br />Population : 18076581"
                    }
                },
                "TJ": {
                    "value": 40979630,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tajikistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tajikistan</span><br />Population : 40979630"
                    }
                },
                "TZ": {
                    "value": 13188501,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tanzania, United Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tanzania, United Republic Of</span><br />Population : 13188501"
                    }
                },
                "TD": {
                    "value": 19200802,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chad",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chad</span><br />Population : 19200802"
                    }
                },
                "CZ": {
                    "value": 29680743,
                    "href": "https://en.wikipedia.org/w/index.php?search=Czech Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Czech Republic</span><br />Population : 29680743"
                    }
                },
                "TH": {
                    "value": 6752102,
                    "href": "https://en.wikipedia.org/w/index.php?search=Thailand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Thailand</span><br />Population : 6752102"
                    }
                },
                "TL": {
                    "value": 59831824,
                    "href": "https://en.wikipedia.org/w/index.php?search=Timor-leste",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Timor-leste</span><br />Population : 59831824"
                    }
                },
                "TG": {
                    "value": 591732,
                    "href": "https://en.wikipedia.org/w/index.php?search=Togo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Togo</span><br />Population : 591732"
                    }
                },
                "TO": {
                    "value": 11685882,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tonga",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tonga</span><br />Population : 11685882"
                    }
                },
                "TT": {
                    "value": 40731021,
                    "href": "https://en.wikipedia.org/w/index.php?search=Trinidad And Tobago",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Trinidad And Tobago</span><br />Population : 40731021"
                    }
                },
                "TN": {
                    "value": 53477686,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tunisia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tunisia</span><br />Population : 53477686"
                    }
                },
                "TM": {
                    "value": 15559421,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkmenistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkmenistan</span><br />Population : 15559421"
                    }
                },
                "TR": {
                    "value": 59557624,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkey",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkey</span><br />Population : 59557624"
                    }
                },
                "TV": {
                    "value": 6269509,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tuvalu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tuvalu</span><br />Population : 6269509"
                    }
                },
                "VU": {
                    "value": 14716711,
                    "href": "https://en.wikipedia.org/w/index.php?search=Vanuatu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Vanuatu</span><br />Population : 14716711"
                    }
                },
                "VE": {
                    "value": 32281992,
                    "href": "https://en.wikipedia.org/w/index.php?search=Venezuela, Bolivarian Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Venezuela, Bolivarian Republic Of</span><br />Population : 32281992"
                    }
                },
                "VN": {
                    "value": 59111591,
                    "href": "https://en.wikipedia.org/w/index.php?search=Viet Nam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Viet Nam</span><br />Population : 59111591"
                    }
                },
                "UA": {
                    "value": 36270694,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ukraine",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ukraine</span><br />Population : 36270694"
                    }
                },
                "UY": {
                    "value": 53989527,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uruguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uruguay</span><br />Population : 53989527"
                    }
                },
                "YE": {
                    "value": 48887571,
                    "href": "https://en.wikipedia.org/w/index.php?search=Yemen",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Yemen</span><br />Population : 48887571"
                    }
                },
                "ZM": {
                    "value": 45913410,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zambia</span><br />Population : 45913410"
                    }
                },
                "ZW": {
                    "value": 53987699,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zimbabwe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zimbabwe</span><br />Population : 53987699"
                    }
                }
            },
            "plots": {
                "paris": {
                    "value": 382495,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paris</span><br />Population: 382495"
                    }
                },
                "newyork": {
                    "value": 881903,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New-York</span><br />Population: 881903"
                    }
                },
                "sydney": {
                    "value": 695496,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sydney</span><br />Population: 695496"
                    }
                },
                "brasilia": {
                    "value": 392706,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brasilia</span><br />Population: 392706"
                    }
                },
                "tokyo": {
                    "value": 1491797,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tokyo</span><br />Population: 1491797"
                    }
                }
            }
        },
        "2010": {
            "areas": {
                "AF": {
                    "value": 44310251,
                    "href": "https://en.wikipedia.org/w/index.php?search=Afghanistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Afghanistan</span><br />Population : 44310251"
                    }
                },
                "ZA": {
                    "value": 33673102,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Africa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Africa</span><br />Population : 33673102"
                    }
                },
                "AL": {
                    "value": 15131668,
                    "href": "https://en.wikipedia.org/w/index.php?search=Albania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Albania</span><br />Population : 15131668"
                    }
                },
                "DZ": {
                    "value": 37266956,
                    "href": "https://en.wikipedia.org/w/index.php?search=Algeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Algeria</span><br />Population : 37266956"
                    }
                },
                "DE": {
                    "value": 49333603,
                    "href": "https://en.wikipedia.org/w/index.php?search=Germany",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Germany</span><br />Population : 49333603"
                    }
                },
                "AD": {
                    "value": 15912225,
                    "href": "https://en.wikipedia.org/w/index.php?search=Andorra",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Andorra</span><br />Population : 15912225"
                    }
                },
                "AO": {
                    "value": 14714883,
                    "href": "https://en.wikipedia.org/w/index.php?search=Angola",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Angola</span><br />Population : 14714883"
                    }
                },
                "AG": {
                    "value": 55481177,
                    "href": "https://en.wikipedia.org/w/index.php?search=Antigua And Barbuda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Antigua And Barbuda</span><br />Population : 55481177"
                    }
                },
                "SA": {
                    "value": 46752463,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saudi Arabia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saudi Arabia</span><br />Population : 46752463"
                    }
                },
                "AR": {
                    "value": 7861700,
                    "href": "https://en.wikipedia.org/w/index.php?search=Argentina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Argentina</span><br />Population : 7861700"
                    }
                },
                "AM": {
                    "value": 54426419,
                    "href": "https://en.wikipedia.org/w/index.php?search=Armenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Armenia</span><br />Population : 54426419"
                    }
                },
                "AU": {
                    "value": 15082312,
                    "href": "https://en.wikipedia.org/w/index.php?search=Australia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Australia</span><br />Population : 15082312"
                    }
                },
                "AT": {
                    "value": 4744955,
                    "href": "https://en.wikipedia.org/w/index.php?search=Austria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Austria</span><br />Population : 4744955"
                    }
                },
                "AZ": {
                    "value": 15137152,
                    "href": "https://en.wikipedia.org/w/index.php?search=Azerbaijan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Azerbaijan</span><br />Population : 15137152"
                    }
                },
                "BS": {
                    "value": 27569400,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahamas",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahamas</span><br />Population : 27569400"
                    }
                },
                "BH": {
                    "value": 26510986,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahrain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahrain</span><br />Population : 26510986"
                    }
                },
                "BD": {
                    "value": 41239206,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bangladesh",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bangladesh</span><br />Population : 41239206"
                    }
                },
                "BB": {
                    "value": 13404205,
                    "href": "https://en.wikipedia.org/w/index.php?search=Barbados",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Barbados</span><br />Population : 13404205"
                    }
                },
                "BE": {
                    "value": 37096951,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belgium",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belgium</span><br />Population : 37096951"
                    }
                },
                "BZ": {
                    "value": 50457825,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belize",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belize</span><br />Population : 50457825"
                    }
                },
                "BJ": {
                    "value": 4613339,
                    "href": "https://en.wikipedia.org/w/index.php?search=Benin",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Benin</span><br />Population : 4613339"
                    }
                },
                "BT": {
                    "value": 8278485,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bhutan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bhutan</span><br />Population : 8278485"
                    }
                },
                "BY": {
                    "value": 36212198,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belarus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belarus</span><br />Population : 36212198"
                    }
                },
                "MM": {
                    "value": 17663452,
                    "href": "https://en.wikipedia.org/w/index.php?search=Myanmar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Myanmar</span><br />Population : 17663452"
                    }
                },
                "BO": {
                    "value": 12795480,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bolivia, Plurinational State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bolivia, Plurinational State Of</span><br />Population : 12795480"
                    }
                },
                "BA": {
                    "value": 35325617,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bosnia And Herzegovina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bosnia And Herzegovina</span><br />Population : 35325617"
                    }
                },
                "BW": {
                    "value": 8068264,
                    "href": "https://en.wikipedia.org/w/index.php?search=Botswana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Botswana</span><br />Population : 8068264"
                    }
                },
                "BR": {
                    "value": 8618493,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brazil",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brazil</span><br />Population : 8618493"
                    }
                },
                "BN": {
                    "value": 33963754,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brunei Darussalam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brunei Darussalam</span><br />Population : 33963754"
                    }
                },
                "BG": {
                    "value": 40261225,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bulgaria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bulgaria</span><br />Population : 40261225"
                    }
                },
                "BF": {
                    "value": 25668277,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burkina Faso",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burkina Faso</span><br />Population : 25668277"
                    }
                },
                "BI": {
                    "value": 13963574,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burundi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burundi</span><br />Population : 13963574"
                    }
                },
                "KH": {
                    "value": 6346286,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cambodia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cambodia</span><br />Population : 6346286"
                    }
                },
                "CM": {
                    "value": 58650934,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cameroon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cameroon</span><br />Population : 58650934"
                    }
                },
                "CA": {
                    "value": 12265359,
                    "href": "https://en.wikipedia.org/w/index.php?search=Canada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Canada</span><br />Population : 12265359"
                    }
                },
                "CV": {
                    "value": 54289319,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cape Verde",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cape Verde</span><br />Population : 54289319"
                    }
                },
                "CF": {
                    "value": 17921200,
                    "href": "https://en.wikipedia.org/w/index.php?search=Central African Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Central African Republic</span><br />Population : 17921200"
                    }
                },
                "CL": {
                    "value": 36210370,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chile",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chile</span><br />Population : 36210370"
                    }
                },
                "CN": {
                    "value": 40862638,
                    "href": "https://en.wikipedia.org/w/index.php?search=China",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">China</span><br />Population : 40862638"
                    }
                },
                "CY": {
                    "value": 436352,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cyprus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cyprus</span><br />Population : 436352"
                    }
                },
                "CO": {
                    "value": 6916623,
                    "href": "https://en.wikipedia.org/w/index.php?search=Colombia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Colombia</span><br />Population : 6916623"
                    }
                },
                "KM": {
                    "value": 8505157,
                    "href": "https://en.wikipedia.org/w/index.php?search=Comoros",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Comoros</span><br />Population : 8505157"
                    }
                },
                "CG": {
                    "value": 34713236,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo</span><br />Population : 34713236"
                    }
                },
                "CD": {
                    "value": 52695301,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo, The Democratic Republic Of The",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo, The Democratic Republic Of The</span><br />Population : 52695301"
                    }
                },
                "KP": {
                    "value": 1410678,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Democratic People's Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Democratic People's Republic Of</span><br />Population : 1410678"
                    }
                },
                "KR": {
                    "value": 41050922,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Republic Of</span><br />Population : 41050922"
                    }
                },
                "CR": {
                    "value": 6920279,
                    "href": "https://en.wikipedia.org/w/index.php?search=Costa Rica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Costa Rica</span><br />Population : 6920279"
                    }
                },
                "CI": {
                    "value": 22006787,
                    "href": "https://en.wikipedia.org/w/index.php?search=C\u00d4te D'ivoire",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">C\u00d4te D'ivoire</span><br />Population : 22006787"
                    }
                },
                "HR": {
                    "value": 59431492,
                    "href": "https://en.wikipedia.org/w/index.php?search=Croatia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Croatia</span><br />Population : 59431492"
                    }
                },
                "CU": {
                    "value": 49613288,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cuba",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cuba</span><br />Population : 49613288"
                    }
                },
                "DK": {
                    "value": 536892,
                    "href": "https://en.wikipedia.org/w/index.php?search=Denmark",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Denmark</span><br />Population : 536892"
                    }
                },
                "DJ": {
                    "value": 48761438,
                    "href": "https://en.wikipedia.org/w/index.php?search=Djibouti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Djibouti</span><br />Population : 48761438"
                    }
                },
                "DM": {
                    "value": 29357187,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominica</span><br />Population : 29357187"
                    }
                },
                "EG": {
                    "value": 39807880,
                    "href": "https://en.wikipedia.org/w/index.php?search=Egypt",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Egypt</span><br />Population : 39807880"
                    }
                },
                "AE": {
                    "value": 28666202,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Arab Emirates",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Arab Emirates</span><br />Population : 28666202"
                    }
                },
                "EC": {
                    "value": 3799877,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ecuador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ecuador</span><br />Population : 3799877"
                    }
                },
                "ER": {
                    "value": 29115890,
                    "href": "https://en.wikipedia.org/w/index.php?search=Eritrea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Eritrea</span><br />Population : 29115890"
                    }
                },
                "ES": {
                    "value": 47200324,
                    "href": "https://en.wikipedia.org/w/index.php?search=Spain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Spain</span><br />Population : 47200324"
                    }
                },
                "EE": {
                    "value": 14561331,
                    "href": "https://en.wikipedia.org/w/index.php?search=Estonia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Estonia</span><br />Population : 14561331"
                    }
                },
                "US": {
                    "value": 27512732,
                    "href": "https://en.wikipedia.org/w/index.php?search=United States",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United States</span><br />Population : 27512732"
                    }
                },
                "ET": {
                    "value": 26885727,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ethiopia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ethiopia</span><br />Population : 26885727"
                    }
                },
                "FJ": {
                    "value": 17506244,
                    "href": "https://en.wikipedia.org/w/index.php?search=Fiji",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Fiji</span><br />Population : 17506244"
                    }
                },
                "FI": {
                    "value": 31225406,
                    "href": "https://en.wikipedia.org/w/index.php?search=Finland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Finland</span><br />Population : 31225406"
                    }
                },
                "FR": {
                    "value": 50640625,
                    "href": "https://en.wikipedia.org/w/index.php?search=France",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">France</span><br />Population : 50640625"
                    }
                },
                "GA": {
                    "value": 20794821,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gabon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gabon</span><br />Population : 20794821"
                    }
                },
                "GM": {
                    "value": 46191266,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gambia</span><br />Population : 46191266"
                    }
                },
                "GE": {
                    "value": 1911550,
                    "href": "https://en.wikipedia.org/w/index.php?search=Georgia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Georgia</span><br />Population : 1911550"
                    }
                },
                "GH": {
                    "value": 33874182,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ghana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ghana</span><br />Population : 33874182"
                    }
                },
                "GR": {
                    "value": 38921298,
                    "href": "https://en.wikipedia.org/w/index.php?search=Greece",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Greece</span><br />Population : 38921298"
                    }
                },
                "GD": {
                    "value": 19071014,
                    "href": "https://en.wikipedia.org/w/index.php?search=Grenada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Grenada</span><br />Population : 19071014"
                    }
                },
                "GT": {
                    "value": 59522892,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guatemala",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guatemala</span><br />Population : 59522892"
                    }
                },
                "GN": {
                    "value": 27754028,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea</span><br />Population : 27754028"
                    }
                },
                "GQ": {
                    "value": 19493283,
                    "href": "https://en.wikipedia.org/w/index.php?search=Equatorial Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Equatorial Guinea</span><br />Population : 19493283"
                    }
                },
                "GW": {
                    "value": 31611115,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea-bissau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea-bissau</span><br />Population : 31611115"
                    }
                },
                "GY": {
                    "value": 7512552,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guyana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guyana</span><br />Population : 7512552"
                    }
                },
                "HT": {
                    "value": 52870789,
                    "href": "https://en.wikipedia.org/w/index.php?search=Haiti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Haiti</span><br />Population : 52870789"
                    }
                },
                "HN": {
                    "value": 50488901,
                    "href": "https://en.wikipedia.org/w/index.php?search=Honduras",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Honduras</span><br />Population : 50488901"
                    }
                },
                "HU": {
                    "value": 29527191,
                    "href": "https://en.wikipedia.org/w/index.php?search=Hungary",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Hungary</span><br />Population : 29527191"
                    }
                },
                "JM": {
                    "value": 38683658,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jamaica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jamaica</span><br />Population : 38683658"
                    }
                },
                "JP": {
                    "value": 39965088,
                    "href": "https://en.wikipedia.org/w/index.php?search=Japan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Japan</span><br />Population : 39965088"
                    }
                },
                "MH": {
                    "value": 10236276,
                    "href": "https://en.wikipedia.org/w/index.php?search=Marshall Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Marshall Islands</span><br />Population : 10236276"
                    }
                },
                "PW": {
                    "value": 48384870,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palau</span><br />Population : 48384870"
                    }
                },
                "SB": {
                    "value": 16389334,
                    "href": "https://en.wikipedia.org/w/index.php?search=Solomon Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Solomon Islands</span><br />Population : 16389334"
                    }
                },
                "IN": {
                    "value": 9627551,
                    "href": "https://en.wikipedia.org/w/index.php?search=India",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">India</span><br />Population : 9627551"
                    }
                },
                "ID": {
                    "value": 46613535,
                    "href": "https://en.wikipedia.org/w/index.php?search=Indonesia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Indonesia</span><br />Population : 46613535"
                    }
                },
                "JO": {
                    "value": 33899774,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jordan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jordan</span><br />Population : 33899774"
                    }
                },
                "IR": {
                    "value": 13632705,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iran, Islamic Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iran, Islamic Republic Of</span><br />Population : 13632705"
                    }
                },
                "IQ": {
                    "value": 12398803,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iraq",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iraq</span><br />Population : 12398803"
                    }
                },
                "IE": {
                    "value": 37948801,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ireland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ireland</span><br />Population : 37948801"
                    }
                },
                "IS": {
                    "value": 21637530,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iceland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iceland</span><br />Population : 21637530"
                    }
                },
                "IL": {
                    "value": 13566897,
                    "href": "https://en.wikipedia.org/w/index.php?search=Israel",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Israel</span><br />Population : 13566897"
                    }
                },
                "IT": {
                    "value": 8969470,
                    "href": "https://en.wikipedia.org/w/index.php?search=Italy",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Italy</span><br />Population : 8969470"
                    }
                },
                "KZ": {
                    "value": 12320199,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kazakhstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kazakhstan</span><br />Population : 12320199"
                    }
                },
                "KE": {
                    "value": 17213763,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kenya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kenya</span><br />Population : 17213763"
                    }
                },
                "KG": {
                    "value": 29295035,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kyrgyzstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kyrgyzstan</span><br />Population : 29295035"
                    }
                },
                "KI": {
                    "value": 49880176,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kiribati",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kiribati</span><br />Population : 49880176"
                    }
                },
                "KW": {
                    "value": 27755856,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kuwait",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kuwait</span><br />Population : 27755856"
                    }
                },
                "LA": {
                    "value": 56194098,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lao People's Democratic Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lao People's Democratic Republic</span><br />Population : 56194098"
                    }
                },
                "LS": {
                    "value": 43970243,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lesotho",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lesotho</span><br />Population : 43970243"
                    }
                },
                "LV": {
                    "value": 35921546,
                    "href": "https://en.wikipedia.org/w/index.php?search=Latvia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Latvia</span><br />Population : 35921546"
                    }
                },
                "LB": {
                    "value": 52433896,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lebanon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lebanon</span><br />Population : 52433896"
                    }
                },
                "LR": {
                    "value": 24394159,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liberia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liberia</span><br />Population : 24394159"
                    }
                },
                "LY": {
                    "value": 10795645,
                    "href": "https://en.wikipedia.org/w/index.php?search=Libya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Libya</span><br />Population : 10795645"
                    }
                },
                "LI": {
                    "value": 17634204,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liechtenstein",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liechtenstein</span><br />Population : 17634204"
                    }
                },
                "LT": {
                    "value": 24582443,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lithuania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lithuania</span><br />Population : 24582443"
                    }
                },
                "LU": {
                    "value": 17279571,
                    "href": "https://en.wikipedia.org/w/index.php?search=Luxembourg",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Luxembourg</span><br />Population : 17279571"
                    }
                },
                "MK": {
                    "value": 32724368,
                    "href": "https://en.wikipedia.org/w/index.php?search=Macedonia, The Former Yugoslav Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Macedonia, The Former Yugoslav Republic Of</span><br />Population : 32724368"
                    }
                },
                "MG": {
                    "value": 15608777,
                    "href": "https://en.wikipedia.org/w/index.php?search=Madagascar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Madagascar</span><br />Population : 15608777"
                    }
                },
                "MY": {
                    "value": 32179623,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malaysia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malaysia</span><br />Population : 32179623"
                    }
                },
                "MW": {
                    "value": 40465961,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malawi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malawi</span><br />Population : 40465961"
                    }
                },
                "MV": {
                    "value": 3059536,
                    "href": "https://en.wikipedia.org/w/index.php?search=Maldives",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Maldives</span><br />Population : 3059536"
                    }
                },
                "ML": {
                    "value": 20485889,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mali",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mali</span><br />Population : 20485889"
                    }
                },
                "MT": {
                    "value": 13453561,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malta",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malta</span><br />Population : 13453561"
                    }
                },
                "MA": {
                    "value": 9718951,
                    "href": "https://en.wikipedia.org/w/index.php?search=Morocco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Morocco</span><br />Population : 9718951"
                    }
                },
                "MU": {
                    "value": 24754275,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritius",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritius</span><br />Population : 24754275"
                    }
                },
                "MR": {
                    "value": 52856165,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritania</span><br />Population : 52856165"
                    }
                },
                "MX": {
                    "value": 56382383,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mexico",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mexico</span><br />Population : 56382383"
                    }
                },
                "FM": {
                    "value": 50454169,
                    "href": "https://en.wikipedia.org/w/index.php?search=Micronesia, Federated States Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Micronesia, Federated States Of</span><br />Population : 50454169"
                    }
                },
                "MD": {
                    "value": 51011710,
                    "href": "https://en.wikipedia.org/w/index.php?search=Moldova, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Moldova, Republic Of</span><br />Population : 51011710"
                    }
                },
                "MC": {
                    "value": 43460230,
                    "href": "https://en.wikipedia.org/w/index.php?search=Monaco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Monaco</span><br />Population : 43460230"
                    }
                },
                "MN": {
                    "value": 39294211,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mongolia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mongolia</span><br />Population : 39294211"
                    }
                },
                "ME": {
                    "value": 18537237,
                    "href": "https://en.wikipedia.org/w/index.php?search=Montenegro",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Montenegro</span><br />Population : 18537237"
                    }
                },
                "MZ": {
                    "value": 5084964,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mozambique",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mozambique</span><br />Population : 5084964"
                    }
                },
                "NA": {
                    "value": 12888708,
                    "href": "https://en.wikipedia.org/w/index.php?search=Namibia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Namibia</span><br />Population : 12888708"
                    }
                },
                "NP": {
                    "value": 50167173,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nepal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nepal</span><br />Population : 50167173"
                    }
                },
                "NI": {
                    "value": 39383783,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nicaragua",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nicaragua</span><br />Population : 39383783"
                    }
                },
                "NE": {
                    "value": 19877164,
                    "href": "https://en.wikipedia.org/w/index.php?search=Niger",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Niger</span><br />Population : 19877164"
                    }
                },
                "NG": {
                    "value": 11682226,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nigeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nigeria</span><br />Population : 11682226"
                    }
                },
                "NO": {
                    "value": 27229391,
                    "href": "https://en.wikipedia.org/w/index.php?search=Norway",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Norway</span><br />Population : 27229391"
                    }
                },
                "NZ": {
                    "value": 28759430,
                    "href": "https://en.wikipedia.org/w/index.php?search=New Zealand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New Zealand</span><br />Population : 28759430"
                    }
                },
                "OM": {
                    "value": 18641434,
                    "href": "https://en.wikipedia.org/w/index.php?search=Oman",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Oman</span><br />Population : 18641434"
                    }
                },
                "UG": {
                    "value": 531408,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uganda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uganda</span><br />Population : 531408"
                    }
                },
                "UZ": {
                    "value": 58458994,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uzbekistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uzbekistan</span><br />Population : 58458994"
                    }
                },
                "PK": {
                    "value": 52179804,
                    "href": "https://en.wikipedia.org/w/index.php?search=Pakistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Pakistan</span><br />Population : 52179804"
                    }
                },
                "PS": {
                    "value": 14480899,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palestine, State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palestine, State Of</span><br />Population : 14480899"
                    }
                },
                "PA": {
                    "value": 29976880,
                    "href": "https://en.wikipedia.org/w/index.php?search=Panama",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Panama</span><br />Population : 29976880"
                    }
                },
                "PG": {
                    "value": 22184103,
                    "href": "https://en.wikipedia.org/w/index.php?search=Papua New Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Papua New Guinea</span><br />Population : 22184103"
                    }
                },
                "PY": {
                    "value": 25410528,
                    "href": "https://en.wikipedia.org/w/index.php?search=Paraguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paraguay</span><br />Population : 25410528"
                    }
                },
                "NL": {
                    "value": 50448685,
                    "href": "https://en.wikipedia.org/w/index.php?search=Netherlands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Netherlands</span><br />Population : 50448685"
                    }
                },
                "PE": {
                    "value": 809265,
                    "href": "https://en.wikipedia.org/w/index.php?search=Peru",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Peru</span><br />Population : 809265"
                    }
                },
                "PH": {
                    "value": 6382846,
                    "href": "https://en.wikipedia.org/w/index.php?search=Philippines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Philippines</span><br />Population : 6382846"
                    }
                },
                "PL": {
                    "value": 13967230,
                    "href": "https://en.wikipedia.org/w/index.php?search=Poland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Poland</span><br />Population : 13967230"
                    }
                },
                "PT": {
                    "value": 19847915,
                    "href": "https://en.wikipedia.org/w/index.php?search=Portugal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Portugal</span><br />Population : 19847915"
                    }
                },
                "QA": {
                    "value": 23469189,
                    "href": "https://en.wikipedia.org/w/index.php?search=Qatar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Qatar</span><br />Population : 23469189"
                    }
                },
                "DO": {
                    "value": 9183346,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominican Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominican Republic</span><br />Population : 9183346"
                    }
                },
                "RO": {
                    "value": 53415534,
                    "href": "https://en.wikipedia.org/w/index.php?search=Romania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Romania</span><br />Population : 53415534"
                    }
                },
                "GB": {
                    "value": 25631717,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Kingdom",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Kingdom</span><br />Population : 25631717"
                    }
                },
                "RU": {
                    "value": 58647278,
                    "href": "https://en.wikipedia.org/w/index.php?search=Russian Federation",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Russian Federation</span><br />Population : 58647278"
                    }
                },
                "RW": {
                    "value": 58663730,
                    "href": "https://en.wikipedia.org/w/index.php?search=Rwanda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Rwanda</span><br />Population : 58663730"
                    }
                },
                "KN": {
                    "value": 29571063,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Kitts And Nevis",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Kitts And Nevis</span><br />Population : 29571063"
                    }
                },
                "SM": {
                    "value": 21003213,
                    "href": "https://en.wikipedia.org/w/index.php?search=San Marino",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">San Marino</span><br />Population : 21003213"
                    }
                },
                "VC": {
                    "value": 37084155,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Vincent And The Grenadines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Vincent And The Grenadines</span><br />Population : 37084155"
                    }
                },
                "LC": {
                    "value": 33152121,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Lucia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Lucia</span><br />Population : 33152121"
                    }
                },
                "SV": {
                    "value": 37899445,
                    "href": "https://en.wikipedia.org/w/index.php?search=El Salvador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">El Salvador</span><br />Population : 37899445"
                    }
                },
                "WS": {
                    "value": 49015531,
                    "href": "https://en.wikipedia.org/w/index.php?search=Samoa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Samoa</span><br />Population : 49015531"
                    }
                },
                "ST": {
                    "value": 39270447,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sao Tome And Principe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sao Tome And Principe</span><br />Population : 39270447"
                    }
                },
                "SN": {
                    "value": 20626645,
                    "href": "https://en.wikipedia.org/w/index.php?search=Senegal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Senegal</span><br />Population : 20626645"
                    }
                },
                "RS": {
                    "value": 24116302,
                    "href": "https://en.wikipedia.org/w/index.php?search=Serbia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Serbia</span><br />Population : 24116302"
                    }
                },
                "SC": {
                    "value": 2971792,
                    "href": "https://en.wikipedia.org/w/index.php?search=Seychelles",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Seychelles</span><br />Population : 2971792"
                    }
                },
                "SL": {
                    "value": 55846778,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sierra Leone",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sierra Leone</span><br />Population : 55846778"
                    }
                },
                "SG": {
                    "value": 19215426,
                    "href": "https://en.wikipedia.org/w/index.php?search=Singapore",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Singapore</span><br />Population : 19215426"
                    }
                },
                "SK": {
                    "value": 23787262,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovakia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovakia</span><br />Population : 23787262"
                    }
                },
                "SI": {
                    "value": 45725125,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovenia</span><br />Population : 45725125"
                    }
                },
                "SO": {
                    "value": 47503772,
                    "href": "https://en.wikipedia.org/w/index.php?search=Somalia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Somalia</span><br />Population : 47503772"
                    }
                },
                "SD": {
                    "value": 56996592,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sudan</span><br />Population : 56996592"
                    }
                },
                "SS": {
                    "value": 42527948,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Sudan</span><br />Population : 42527948"
                    }
                },
                "LK": {
                    "value": 10678653,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sri Lanka",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sri Lanka</span><br />Population : 10678653"
                    }
                },
                "SE": {
                    "value": 4882055,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sweden",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sweden</span><br />Population : 4882055"
                    }
                },
                "CH": {
                    "value": 12298263,
                    "href": "https://en.wikipedia.org/w/index.php?search=Switzerland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Switzerland</span><br />Population : 12298263"
                    }
                },
                "SR": {
                    "value": 56003986,
                    "href": "https://en.wikipedia.org/w/index.php?search=Suriname",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Suriname</span><br />Population : 56003986"
                    }
                },
                "SZ": {
                    "value": 785501,
                    "href": "https://en.wikipedia.org/w/index.php?search=Swaziland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Swaziland</span><br />Population : 785501"
                    }
                },
                "SY": {
                    "value": 8472253,
                    "href": "https://en.wikipedia.org/w/index.php?search=Syrian Arab Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Syrian Arab Republic</span><br />Population : 8472253"
                    }
                },
                "TJ": {
                    "value": 32998569,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tajikistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tajikistan</span><br />Population : 32998569"
                    }
                },
                "TZ": {
                    "value": 9930999,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tanzania, United Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tanzania, United Republic Of</span><br />Population : 9930999"
                    }
                },
                "TD": {
                    "value": 29148795,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chad",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chad</span><br />Population : 29148795"
                    }
                },
                "CZ": {
                    "value": 48914991,
                    "href": "https://en.wikipedia.org/w/index.php?search=Czech Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Czech Republic</span><br />Population : 48914991"
                    }
                },
                "TH": {
                    "value": 57325632,
                    "href": "https://en.wikipedia.org/w/index.php?search=Thailand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Thailand</span><br />Population : 57325632"
                    }
                },
                "TL": {
                    "value": 59674616,
                    "href": "https://en.wikipedia.org/w/index.php?search=Timor-leste",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Timor-leste</span><br />Population : 59674616"
                    }
                },
                "TG": {
                    "value": 19021658,
                    "href": "https://en.wikipedia.org/w/index.php?search=Togo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Togo</span><br />Population : 19021658"
                    }
                },
                "TO": {
                    "value": 27000891,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tonga",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tonga</span><br />Population : 27000891"
                    }
                },
                "TT": {
                    "value": 53457578,
                    "href": "https://en.wikipedia.org/w/index.php?search=Trinidad And Tobago",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Trinidad And Tobago</span><br />Population : 53457578"
                    }
                },
                "TN": {
                    "value": 31150458,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tunisia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tunisia</span><br />Population : 31150458"
                    }
                },
                "TM": {
                    "value": 43407218,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkmenistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkmenistan</span><br />Population : 43407218"
                    }
                },
                "TR": {
                    "value": 53170581,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkey",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkey</span><br />Population : 53170581"
                    }
                },
                "TV": {
                    "value": 19522531,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tuvalu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tuvalu</span><br />Population : 19522531"
                    }
                },
                "VU": {
                    "value": 19824151,
                    "href": "https://en.wikipedia.org/w/index.php?search=Vanuatu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Vanuatu</span><br />Population : 19824151"
                    }
                },
                "VE": {
                    "value": 25558597,
                    "href": "https://en.wikipedia.org/w/index.php?search=Venezuela, Bolivarian Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Venezuela, Bolivarian Republic Of</span><br />Population : 25558597"
                    }
                },
                "VN": {
                    "value": 28214685,
                    "href": "https://en.wikipedia.org/w/index.php?search=Viet Nam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Viet Nam</span><br />Population : 28214685"
                    }
                },
                "UA": {
                    "value": 43498618,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ukraine",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ukraine</span><br />Population : 43498618"
                    }
                },
                "UY": {
                    "value": 31311322,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uruguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uruguay</span><br />Population : 31311322"
                    }
                },
                "YE": {
                    "value": 38478922,
                    "href": "https://en.wikipedia.org/w/index.php?search=Yemen",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Yemen</span><br />Population : 38478922"
                    }
                },
                "ZM": {
                    "value": 2673828,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zambia</span><br />Population : 2673828"
                    }
                },
                "ZW": {
                    "value": 3713961,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zimbabwe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zimbabwe</span><br />Population : 3713961"
                    }
                }
            },
            "plots": {
                "paris": {
                    "value": 1062415,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paris</span><br />Population: 1062415"
                    }
                },
                "newyork": {
                    "value": 224371,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New-York</span><br />Population: 224371"
                    }
                },
                "sydney": {
                    "value": 1430787,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sydney</span><br />Population: 1430787"
                    }
                },
                "brasilia": {
                    "value": 1220624,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brasilia</span><br />Population: 1220624"
                    }
                },
                "tokyo": {
                    "value": 1391053,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tokyo</span><br />Population: 1391053"
                    }
                }
            }
        },
        "2011": {
            "areas": {
                "AF": {
                    "value": 59288907,
                    "href": "https://en.wikipedia.org/w/index.php?search=Afghanistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Afghanistan</span><br />Population : 59288907"
                    }
                },
                "ZA": {
                    "value": 2249731,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Africa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Africa</span><br />Population : 2249731"
                    }
                },
                "AL": {
                    "value": 54824924,
                    "href": "https://en.wikipedia.org/w/index.php?search=Albania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Albania</span><br />Population : 54824924"
                    }
                },
                "DZ": {
                    "value": 49159943,
                    "href": "https://en.wikipedia.org/w/index.php?search=Algeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Algeria</span><br />Population : 49159943"
                    }
                },
                "DE": {
                    "value": 3534817,
                    "href": "https://en.wikipedia.org/w/index.php?search=Germany",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Germany</span><br />Population : 3534817"
                    }
                },
                "AD": {
                    "value": 38597742,
                    "href": "https://en.wikipedia.org/w/index.php?search=Andorra",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Andorra</span><br />Population : 38597742"
                    }
                },
                "AO": {
                    "value": 52126792,
                    "href": "https://en.wikipedia.org/w/index.php?search=Angola",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Angola</span><br />Population : 52126792"
                    }
                },
                "AG": {
                    "value": 28357269,
                    "href": "https://en.wikipedia.org/w/index.php?search=Antigua And Barbuda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Antigua And Barbuda</span><br />Population : 28357269"
                    }
                },
                "SA": {
                    "value": 30962173,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saudi Arabia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saudi Arabia</span><br />Population : 30962173"
                    }
                },
                "AR": {
                    "value": 36923291,
                    "href": "https://en.wikipedia.org/w/index.php?search=Argentina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Argentina</span><br />Population : 36923291"
                    }
                },
                "AM": {
                    "value": 38080417,
                    "href": "https://en.wikipedia.org/w/index.php?search=Armenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Armenia</span><br />Population : 38080417"
                    }
                },
                "AU": {
                    "value": 28496197,
                    "href": "https://en.wikipedia.org/w/index.php?search=Australia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Australia</span><br />Population : 28496197"
                    }
                },
                "AT": {
                    "value": 4924099,
                    "href": "https://en.wikipedia.org/w/index.php?search=Austria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Austria</span><br />Population : 4924099"
                    }
                },
                "AZ": {
                    "value": 17817004,
                    "href": "https://en.wikipedia.org/w/index.php?search=Azerbaijan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Azerbaijan</span><br />Population : 17817004"
                    }
                },
                "BS": {
                    "value": 40763925,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahamas",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahamas</span><br />Population : 40763925"
                    }
                },
                "BH": {
                    "value": 55192353,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahrain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahrain</span><br />Population : 55192353"
                    }
                },
                "BD": {
                    "value": 58323722,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bangladesh",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bangladesh</span><br />Population : 58323722"
                    }
                },
                "BB": {
                    "value": 31819507,
                    "href": "https://en.wikipedia.org/w/index.php?search=Barbados",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Barbados</span><br />Population : 31819507"
                    }
                },
                "BE": {
                    "value": 58305442,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belgium",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belgium</span><br />Population : 58305442"
                    }
                },
                "BZ": {
                    "value": 24211359,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belize",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belize</span><br />Population : 24211359"
                    }
                },
                "BJ": {
                    "value": 54514164,
                    "href": "https://en.wikipedia.org/w/index.php?search=Benin",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Benin</span><br />Population : 54514164"
                    }
                },
                "BT": {
                    "value": 39621423,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bhutan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bhutan</span><br />Population : 39621423"
                    }
                },
                "BY": {
                    "value": 58883091,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belarus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belarus</span><br />Population : 58883091"
                    }
                },
                "MM": {
                    "value": 1068841,
                    "href": "https://en.wikipedia.org/w/index.php?search=Myanmar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Myanmar</span><br />Population : 1068841"
                    }
                },
                "BO": {
                    "value": 6598550,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bolivia, Plurinational State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bolivia, Plurinational State Of</span><br />Population : 6598550"
                    }
                },
                "BA": {
                    "value": 31863379,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bosnia And Herzegovina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bosnia And Herzegovina</span><br />Population : 31863379"
                    }
                },
                "BW": {
                    "value": 40624997,
                    "href": "https://en.wikipedia.org/w/index.php?search=Botswana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Botswana</span><br />Population : 40624997"
                    }
                },
                "BR": {
                    "value": 21330426,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brazil",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brazil</span><br />Population : 21330426"
                    }
                },
                "BN": {
                    "value": 17530008,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brunei Darussalam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brunei Darussalam</span><br />Population : 17530008"
                    }
                },
                "BG": {
                    "value": 29135999,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bulgaria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bulgaria</span><br />Population : 29135999"
                    }
                },
                "BF": {
                    "value": 31609287,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burkina Faso",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burkina Faso</span><br />Population : 31609287"
                    }
                },
                "BI": {
                    "value": 30711737,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burundi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burundi</span><br />Population : 30711737"
                    }
                },
                "KH": {
                    "value": 40511661,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cambodia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cambodia</span><br />Population : 40511661"
                    }
                },
                "CM": {
                    "value": 22079907,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cameroon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cameroon</span><br />Population : 22079907"
                    }
                },
                "CA": {
                    "value": 29964084,
                    "href": "https://en.wikipedia.org/w/index.php?search=Canada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Canada</span><br />Population : 29964084"
                    }
                },
                "CV": {
                    "value": 4878399,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cape Verde",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cape Verde</span><br />Population : 4878399"
                    }
                },
                "CF": {
                    "value": 58696634,
                    "href": "https://en.wikipedia.org/w/index.php?search=Central African Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Central African Republic</span><br />Population : 58696634"
                    }
                },
                "CL": {
                    "value": 31285730,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chile",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chile</span><br />Population : 31285730"
                    }
                },
                "CN": {
                    "value": 3867514,
                    "href": "https://en.wikipedia.org/w/index.php?search=China",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">China</span><br />Population : 3867514"
                    }
                },
                "CY": {
                    "value": 9346038,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cyprus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cyprus</span><br />Population : 9346038"
                    }
                },
                "CO": {
                    "value": 25288052,
                    "href": "https://en.wikipedia.org/w/index.php?search=Colombia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Colombia</span><br />Population : 25288052"
                    }
                },
                "KM": {
                    "value": 47394092,
                    "href": "https://en.wikipedia.org/w/index.php?search=Comoros",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Comoros</span><br />Population : 47394092"
                    }
                },
                "CG": {
                    "value": 11347702,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo</span><br />Population : 11347702"
                    }
                },
                "CD": {
                    "value": 19780279,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo, The Democratic Republic Of The",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo, The Democratic Republic Of The</span><br />Population : 19780279"
                    }
                },
                "KP": {
                    "value": 43239041,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Democratic People's Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Democratic People's Republic Of</span><br />Population : 43239041"
                    }
                },
                "KR": {
                    "value": 31095618,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Republic Of</span><br />Population : 31095618"
                    }
                },
                "CR": {
                    "value": 20582773,
                    "href": "https://en.wikipedia.org/w/index.php?search=Costa Rica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Costa Rica</span><br />Population : 20582773"
                    }
                },
                "CI": {
                    "value": 41796747,
                    "href": "https://en.wikipedia.org/w/index.php?search=C\u00d4te D'ivoire",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">C\u00d4te D'ivoire</span><br />Population : 41796747"
                    }
                },
                "HR": {
                    "value": 5852725,
                    "href": "https://en.wikipedia.org/w/index.php?search=Croatia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Croatia</span><br />Population : 5852725"
                    }
                },
                "CU": {
                    "value": 32930933,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cuba",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cuba</span><br />Population : 32930933"
                    }
                },
                "DK": {
                    "value": 29700851,
                    "href": "https://en.wikipedia.org/w/index.php?search=Denmark",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Denmark</span><br />Population : 29700851"
                    }
                },
                "DJ": {
                    "value": 51061066,
                    "href": "https://en.wikipedia.org/w/index.php?search=Djibouti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Djibouti</span><br />Population : 51061066"
                    }
                },
                "DM": {
                    "value": 16082229,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominica</span><br />Population : 16082229"
                    }
                },
                "EG": {
                    "value": 13590661,
                    "href": "https://en.wikipedia.org/w/index.php?search=Egypt",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Egypt</span><br />Population : 13590661"
                    }
                },
                "AE": {
                    "value": 6880062,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Arab Emirates",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Arab Emirates</span><br />Population : 6880062"
                    }
                },
                "EC": {
                    "value": 53188861,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ecuador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ecuador</span><br />Population : 53188861"
                    }
                },
                "ER": {
                    "value": 27130679,
                    "href": "https://en.wikipedia.org/w/index.php?search=Eritrea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Eritrea</span><br />Population : 27130679"
                    }
                },
                "ES": {
                    "value": 23615430,
                    "href": "https://en.wikipedia.org/w/index.php?search=Spain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Spain</span><br />Population : 23615430"
                    }
                },
                "EE": {
                    "value": 10148532,
                    "href": "https://en.wikipedia.org/w/index.php?search=Estonia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Estonia</span><br />Population : 10148532"
                    }
                },
                "US": {
                    "value": 23845758,
                    "href": "https://en.wikipedia.org/w/index.php?search=United States",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United States</span><br />Population : 23845758"
                    }
                },
                "ET": {
                    "value": 22151199,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ethiopia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ethiopia</span><br />Population : 22151199"
                    }
                },
                "FJ": {
                    "value": 23695862,
                    "href": "https://en.wikipedia.org/w/index.php?search=Fiji",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Fiji</span><br />Population : 23695862"
                    }
                },
                "FI": {
                    "value": 7684384,
                    "href": "https://en.wikipedia.org/w/index.php?search=Finland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Finland</span><br />Population : 7684384"
                    }
                },
                "FR": {
                    "value": 28547382,
                    "href": "https://en.wikipedia.org/w/index.php?search=France",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">France</span><br />Population : 28547382"
                    }
                },
                "GA": {
                    "value": 14246914,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gabon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gabon</span><br />Population : 14246914"
                    }
                },
                "GM": {
                    "value": 4472583,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gambia</span><br />Population : 4472583"
                    }
                },
                "GE": {
                    "value": 57515744,
                    "href": "https://en.wikipedia.org/w/index.php?search=Georgia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Georgia</span><br />Population : 57515744"
                    }
                },
                "GH": {
                    "value": 42959357,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ghana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ghana</span><br />Population : 42959357"
                    }
                },
                "GR": {
                    "value": 46470951,
                    "href": "https://en.wikipedia.org/w/index.php?search=Greece",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Greece</span><br />Population : 46470951"
                    }
                },
                "GD": {
                    "value": 46436219,
                    "href": "https://en.wikipedia.org/w/index.php?search=Grenada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Grenada</span><br />Population : 46436219"
                    }
                },
                "GT": {
                    "value": 8020736,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guatemala",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guatemala</span><br />Population : 8020736"
                    }
                },
                "GN": {
                    "value": 12797308,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea</span><br />Population : 12797308"
                    }
                },
                "GQ": {
                    "value": 12126431,
                    "href": "https://en.wikipedia.org/w/index.php?search=Equatorial Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Equatorial Guinea</span><br />Population : 12126431"
                    }
                },
                "GW": {
                    "value": 20427392,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea-bissau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea-bissau</span><br />Population : 20427392"
                    }
                },
                "GY": {
                    "value": 37027487,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guyana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guyana</span><br />Population : 37027487"
                    }
                },
                "HT": {
                    "value": 33526862,
                    "href": "https://en.wikipedia.org/w/index.php?search=Haiti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Haiti</span><br />Population : 33526862"
                    }
                },
                "HN": {
                    "value": 14166482,
                    "href": "https://en.wikipedia.org/w/index.php?search=Honduras",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Honduras</span><br />Population : 14166482"
                    }
                },
                "HU": {
                    "value": 6936731,
                    "href": "https://en.wikipedia.org/w/index.php?search=Hungary",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Hungary</span><br />Population : 6936731"
                    }
                },
                "JM": {
                    "value": 52814121,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jamaica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jamaica</span><br />Population : 52814121"
                    }
                },
                "JP": {
                    "value": 50863642,
                    "href": "https://en.wikipedia.org/w/index.php?search=Japan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Japan</span><br />Population : 50863642"
                    }
                },
                "MH": {
                    "value": 5794229,
                    "href": "https://en.wikipedia.org/w/index.php?search=Marshall Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Marshall Islands</span><br />Population : 5794229"
                    }
                },
                "PW": {
                    "value": 56504859,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palau</span><br />Population : 56504859"
                    }
                },
                "SB": {
                    "value": 53508762,
                    "href": "https://en.wikipedia.org/w/index.php?search=Solomon Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Solomon Islands</span><br />Population : 53508762"
                    }
                },
                "IN": {
                    "value": 40473273,
                    "href": "https://en.wikipedia.org/w/index.php?search=India",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">India</span><br />Population : 40473273"
                    }
                },
                "ID": {
                    "value": 30062796,
                    "href": "https://en.wikipedia.org/w/index.php?search=Indonesia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Indonesia</span><br />Population : 30062796"
                    }
                },
                "JO": {
                    "value": 10022400,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jordan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jordan</span><br />Population : 10022400"
                    }
                },
                "IR": {
                    "value": 7289535,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iran, Islamic Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iran, Islamic Republic Of</span><br />Population : 7289535"
                    }
                },
                "IQ": {
                    "value": 7971380,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iraq",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iraq</span><br />Population : 7971380"
                    }
                },
                "IE": {
                    "value": 40175308,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ireland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ireland</span><br />Population : 40175308"
                    }
                },
                "IS": {
                    "value": 37829981,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iceland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iceland</span><br />Population : 37829981"
                    }
                },
                "IL": {
                    "value": 32084567,
                    "href": "https://en.wikipedia.org/w/index.php?search=Israel",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Israel</span><br />Population : 32084567"
                    }
                },
                "IT": {
                    "value": 48823590,
                    "href": "https://en.wikipedia.org/w/index.php?search=Italy",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Italy</span><br />Population : 48823590"
                    }
                },
                "KZ": {
                    "value": 19284891,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kazakhstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kazakhstan</span><br />Population : 19284891"
                    }
                },
                "KE": {
                    "value": 40718225,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kenya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kenya</span><br />Population : 40718225"
                    }
                },
                "KG": {
                    "value": 36171982,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kyrgyzstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kyrgyzstan</span><br />Population : 36171982"
                    }
                },
                "KI": {
                    "value": 48845526,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kiribati",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kiribati</span><br />Population : 48845526"
                    }
                },
                "KW": {
                    "value": 40394669,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kuwait",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kuwait</span><br />Population : 40394669"
                    }
                },
                "LA": {
                    "value": 9327758,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lao People's Democratic Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lao People's Democratic Republic</span><br />Population : 9327758"
                    }
                },
                "LS": {
                    "value": 17679904,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lesotho",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lesotho</span><br />Population : 17679904"
                    }
                },
                "LV": {
                    "value": 43602814,
                    "href": "https://en.wikipedia.org/w/index.php?search=Latvia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Latvia</span><br />Population : 43602814"
                    }
                },
                "LB": {
                    "value": 26757767,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lebanon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lebanon</span><br />Population : 26757767"
                    }
                },
                "LR": {
                    "value": 24149206,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liberia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liberia</span><br />Population : 24149206"
                    }
                },
                "LY": {
                    "value": 4686459,
                    "href": "https://en.wikipedia.org/w/index.php?search=Libya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Libya</span><br />Population : 4686459"
                    }
                },
                "LI": {
                    "value": 38711078,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liechtenstein",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liechtenstein</span><br />Population : 38711078"
                    }
                },
                "LT": {
                    "value": 51377311,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lithuania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lithuania</span><br />Population : 51377311"
                    }
                },
                "LU": {
                    "value": 15923193,
                    "href": "https://en.wikipedia.org/w/index.php?search=Luxembourg",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Luxembourg</span><br />Population : 15923193"
                    }
                },
                "MK": {
                    "value": 55219773,
                    "href": "https://en.wikipedia.org/w/index.php?search=Macedonia, The Former Yugoslav Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Macedonia, The Former Yugoslav Republic Of</span><br />Population : 55219773"
                    }
                },
                "MG": {
                    "value": 9835943,
                    "href": "https://en.wikipedia.org/w/index.php?search=Madagascar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Madagascar</span><br />Population : 9835943"
                    }
                },
                "MY": {
                    "value": 37506424,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malaysia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malaysia</span><br />Population : 37506424"
                    }
                },
                "MW": {
                    "value": 5240344,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malawi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malawi</span><br />Population : 5240344"
                    }
                },
                "MV": {
                    "value": 17657968,
                    "href": "https://en.wikipedia.org/w/index.php?search=Maldives",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Maldives</span><br />Population : 17657968"
                    }
                },
                "ML": {
                    "value": 22493036,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mali",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mali</span><br />Population : 22493036"
                    }
                },
                "MT": {
                    "value": 58148234,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malta",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malta</span><br />Population : 58148234"
                    }
                },
                "MA": {
                    "value": 42641284,
                    "href": "https://en.wikipedia.org/w/index.php?search=Morocco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Morocco</span><br />Population : 42641284"
                    }
                },
                "MU": {
                    "value": 9929171,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritius",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritius</span><br />Population : 9929171"
                    }
                },
                "MR": {
                    "value": 52347980,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritania</span><br />Population : 52347980"
                    }
                },
                "MX": {
                    "value": 36555863,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mexico",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mexico</span><br />Population : 36555863"
                    }
                },
                "FM": {
                    "value": 28916638,
                    "href": "https://en.wikipedia.org/w/index.php?search=Micronesia, Federated States Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Micronesia, Federated States Of</span><br />Population : 28916638"
                    }
                },
                "MD": {
                    "value": 211508,
                    "href": "https://en.wikipedia.org/w/index.php?search=Moldova, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Moldova, Republic Of</span><br />Population : 211508"
                    }
                },
                "MC": {
                    "value": 45116400,
                    "href": "https://en.wikipedia.org/w/index.php?search=Monaco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Monaco</span><br />Population : 45116400"
                    }
                },
                "MN": {
                    "value": 45732437,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mongolia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mongolia</span><br />Population : 45732437"
                    }
                },
                "ME": {
                    "value": 14607031,
                    "href": "https://en.wikipedia.org/w/index.php?search=Montenegro",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Montenegro</span><br />Population : 14607031"
                    }
                },
                "MZ": {
                    "value": 46533103,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mozambique",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mozambique</span><br />Population : 46533103"
                    }
                },
                "NA": {
                    "value": 36363922,
                    "href": "https://en.wikipedia.org/w/index.php?search=Namibia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Namibia</span><br />Population : 36363922"
                    }
                },
                "NP": {
                    "value": 8931082,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nepal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nepal</span><br />Population : 8931082"
                    }
                },
                "NI": {
                    "value": 20303088,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nicaragua",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nicaragua</span><br />Population : 20303088"
                    }
                },
                "NE": {
                    "value": 57172080,
                    "href": "https://en.wikipedia.org/w/index.php?search=Niger",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Niger</span><br />Population : 57172080"
                    }
                },
                "NG": {
                    "value": 31706171,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nigeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nigeria</span><br />Population : 31706171"
                    }
                },
                "NO": {
                    "value": 59054923,
                    "href": "https://en.wikipedia.org/w/index.php?search=Norway",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Norway</span><br />Population : 59054923"
                    }
                },
                "NZ": {
                    "value": 36645435,
                    "href": "https://en.wikipedia.org/w/index.php?search=New Zealand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New Zealand</span><br />Population : 36645435"
                    }
                },
                "OM": {
                    "value": 30256564,
                    "href": "https://en.wikipedia.org/w/index.php?search=Oman",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Oman</span><br />Population : 30256564"
                    }
                },
                "UG": {
                    "value": 6808770,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uganda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uganda</span><br />Population : 6808770"
                    }
                },
                "UZ": {
                    "value": 59457084,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uzbekistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uzbekistan</span><br />Population : 59457084"
                    }
                },
                "PK": {
                    "value": 24324695,
                    "href": "https://en.wikipedia.org/w/index.php?search=Pakistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Pakistan</span><br />Population : 24324695"
                    }
                },
                "PS": {
                    "value": 53764682,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palestine, State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palestine, State Of</span><br />Population : 53764682"
                    }
                },
                "PA": {
                    "value": 27187347,
                    "href": "https://en.wikipedia.org/w/index.php?search=Panama",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Panama</span><br />Population : 27187347"
                    }
                },
                "PG": {
                    "value": 23240689,
                    "href": "https://en.wikipedia.org/w/index.php?search=Papua New Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Papua New Guinea</span><br />Population : 23240689"
                    }
                },
                "PY": {
                    "value": 33881494,
                    "href": "https://en.wikipedia.org/w/index.php?search=Paraguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paraguay</span><br />Population : 33881494"
                    }
                },
                "NL": {
                    "value": 6024557,
                    "href": "https://en.wikipedia.org/w/index.php?search=Netherlands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Netherlands</span><br />Population : 6024557"
                    }
                },
                "PE": {
                    "value": 8607525,
                    "href": "https://en.wikipedia.org/w/index.php?search=Peru",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Peru</span><br />Population : 8607525"
                    }
                },
                "PH": {
                    "value": 53358866,
                    "href": "https://en.wikipedia.org/w/index.php?search=Philippines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Philippines</span><br />Population : 53358866"
                    }
                },
                "PL": {
                    "value": 26006457,
                    "href": "https://en.wikipedia.org/w/index.php?search=Poland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Poland</span><br />Population : 26006457"
                    }
                },
                "PT": {
                    "value": 34914316,
                    "href": "https://en.wikipedia.org/w/index.php?search=Portugal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Portugal</span><br />Population : 34914316"
                    }
                },
                "QA": {
                    "value": 16584930,
                    "href": "https://en.wikipedia.org/w/index.php?search=Qatar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Qatar</span><br />Population : 16584930"
                    }
                },
                "DO": {
                    "value": 43114737,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominican Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominican Republic</span><br />Population : 43114737"
                    }
                },
                "RO": {
                    "value": 51240210,
                    "href": "https://en.wikipedia.org/w/index.php?search=Romania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Romania</span><br />Population : 51240210"
                    }
                },
                "GB": {
                    "value": 18762082,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Kingdom",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Kingdom</span><br />Population : 18762082"
                    }
                },
                "RU": {
                    "value": 26785187,
                    "href": "https://en.wikipedia.org/w/index.php?search=Russian Federation",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Russian Federation</span><br />Population : 26785187"
                    }
                },
                "RW": {
                    "value": 35561429,
                    "href": "https://en.wikipedia.org/w/index.php?search=Rwanda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Rwanda</span><br />Population : 35561429"
                    }
                },
                "KN": {
                    "value": 10373376,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Kitts And Nevis",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Kitts And Nevis</span><br />Population : 10373376"
                    }
                },
                "SM": {
                    "value": 45545981,
                    "href": "https://en.wikipedia.org/w/index.php?search=San Marino",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">San Marino</span><br />Population : 45545981"
                    }
                },
                "VC": {
                    "value": 44823920,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Vincent And The Grenadines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Vincent And The Grenadines</span><br />Population : 44823920"
                    }
                },
                "LC": {
                    "value": 43802066,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Lucia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Lucia</span><br />Population : 43802066"
                    }
                },
                "SV": {
                    "value": 13846582,
                    "href": "https://en.wikipedia.org/w/index.php?search=El Salvador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">El Salvador</span><br />Population : 13846582"
                    }
                },
                "WS": {
                    "value": 53494138,
                    "href": "https://en.wikipedia.org/w/index.php?search=Samoa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Samoa</span><br />Population : 53494138"
                    }
                },
                "ST": {
                    "value": 46366754,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sao Tome And Principe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sao Tome And Principe</span><br />Population : 46366754"
                    }
                },
                "SN": {
                    "value": 50989774,
                    "href": "https://en.wikipedia.org/w/index.php?search=Senegal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Senegal</span><br />Population : 50989774"
                    }
                },
                "RS": {
                    "value": 22350452,
                    "href": "https://en.wikipedia.org/w/index.php?search=Serbia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Serbia</span><br />Population : 22350452"
                    }
                },
                "SC": {
                    "value": 10784677,
                    "href": "https://en.wikipedia.org/w/index.php?search=Seychelles",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Seychelles</span><br />Population : 10784677"
                    }
                },
                "SL": {
                    "value": 37029315,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sierra Leone",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sierra Leone</span><br />Population : 37029315"
                    }
                },
                "SG": {
                    "value": 10327676,
                    "href": "https://en.wikipedia.org/w/index.php?search=Singapore",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Singapore</span><br />Population : 10327676"
                    }
                },
                "SK": {
                    "value": 26525610,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovakia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovakia</span><br />Population : 26525610"
                    }
                },
                "SI": {
                    "value": 35345725,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovenia</span><br />Population : 35345725"
                    }
                },
                "SO": {
                    "value": 52377228,
                    "href": "https://en.wikipedia.org/w/index.php?search=Somalia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Somalia</span><br />Population : 52377228"
                    }
                },
                "SD": {
                    "value": 24768899,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sudan</span><br />Population : 24768899"
                    }
                },
                "SS": {
                    "value": 46962683,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Sudan</span><br />Population : 46962683"
                    }
                },
                "LK": {
                    "value": 35455405,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sri Lanka",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sri Lanka</span><br />Population : 35455405"
                    }
                },
                "SE": {
                    "value": 38126117,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sweden",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sweden</span><br />Population : 38126117"
                    }
                },
                "CH": {
                    "value": 47516568,
                    "href": "https://en.wikipedia.org/w/index.php?search=Switzerland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Switzerland</span><br />Population : 47516568"
                    }
                },
                "SR": {
                    "value": 14402295,
                    "href": "https://en.wikipedia.org/w/index.php?search=Suriname",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Suriname</span><br />Population : 14402295"
                    }
                },
                "SZ": {
                    "value": 9241842,
                    "href": "https://en.wikipedia.org/w/index.php?search=Swaziland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Swaziland</span><br />Population : 9241842"
                    }
                },
                "SY": {
                    "value": 29841608,
                    "href": "https://en.wikipedia.org/w/index.php?search=Syrian Arab Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Syrian Arab Republic</span><br />Population : 29841608"
                    }
                },
                "TJ": {
                    "value": 1823806,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tajikistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tajikistan</span><br />Population : 1823806"
                    }
                },
                "TZ": {
                    "value": 9335070,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tanzania, United Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tanzania, United Republic Of</span><br />Population : 9335070"
                    }
                },
                "TD": {
                    "value": 44683164,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chad",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chad</span><br />Population : 44683164"
                    }
                },
                "CZ": {
                    "value": 33139325,
                    "href": "https://en.wikipedia.org/w/index.php?search=Czech Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Czech Republic</span><br />Population : 33139325"
                    }
                },
                "TH": {
                    "value": 20593741,
                    "href": "https://en.wikipedia.org/w/index.php?search=Thailand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Thailand</span><br />Population : 20593741"
                    }
                },
                "TL": {
                    "value": 22401636,
                    "href": "https://en.wikipedia.org/w/index.php?search=Timor-leste",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Timor-leste</span><br />Population : 22401636"
                    }
                },
                "TG": {
                    "value": 20107492,
                    "href": "https://en.wikipedia.org/w/index.php?search=Togo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Togo</span><br />Population : 20107492"
                    }
                },
                "TO": {
                    "value": 23684894,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tonga",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tonga</span><br />Population : 23684894"
                    }
                },
                "TT": {
                    "value": 27079495,
                    "href": "https://en.wikipedia.org/w/index.php?search=Trinidad And Tobago",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Trinidad And Tobago</span><br />Population : 27079495"
                    }
                },
                "TN": {
                    "value": 14292614,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tunisia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tunisia</span><br />Population : 14292614"
                    }
                },
                "TM": {
                    "value": 23492953,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkmenistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkmenistan</span><br />Population : 23492953"
                    }
                },
                "TR": {
                    "value": 7093939,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkey",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkey</span><br />Population : 7093939"
                    }
                },
                "TV": {
                    "value": 34384195,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tuvalu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tuvalu</span><br />Population : 34384195"
                    }
                },
                "VU": {
                    "value": 35548633,
                    "href": "https://en.wikipedia.org/w/index.php?search=Vanuatu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Vanuatu</span><br />Population : 35548633"
                    }
                },
                "VE": {
                    "value": 52967673,
                    "href": "https://en.wikipedia.org/w/index.php?search=Venezuela, Bolivarian Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Venezuela, Bolivarian Republic Of</span><br />Population : 52967673"
                    }
                },
                "VN": {
                    "value": 18932086,
                    "href": "https://en.wikipedia.org/w/index.php?search=Viet Nam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Viet Nam</span><br />Population : 18932086"
                    }
                },
                "UA": {
                    "value": 25660965,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ukraine",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ukraine</span><br />Population : 25660965"
                    }
                },
                "UY": {
                    "value": 46860315,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uruguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uruguay</span><br />Population : 46860315"
                    }
                },
                "YE": {
                    "value": 16809775,
                    "href": "https://en.wikipedia.org/w/index.php?search=Yemen",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Yemen</span><br />Population : 16809775"
                    }
                },
                "ZM": {
                    "value": 4914959,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zambia</span><br />Population : 4914959"
                    }
                },
                "ZW": {
                    "value": 14012930,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zimbabwe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zimbabwe</span><br />Population : 14012930"
                    }
                }
            },
            "plots": {
                "paris": {
                    "value": 1006104,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paris</span><br />Population: 1006104"
                    }
                },
                "newyork": {
                    "value": 867719,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New-York</span><br />Population: 867719"
                    }
                },
                "sydney": {
                    "value": 111877,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sydney</span><br />Population: 111877"
                    }
                },
                "brasilia": {
                    "value": 1090827,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brasilia</span><br />Population: 1090827"
                    }
                },
                "tokyo": {
                    "value": 849390,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tokyo</span><br />Population: 849390"
                    }
                }
            }
        },
        "2012": {
            "areas": {
                "AF": {
                    "value": 9658627,
                    "href": "https://en.wikipedia.org/w/index.php?search=Afghanistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Afghanistan</span><br />Population : 9658627"
                    }
                },
                "ZA": {
                    "value": 11627386,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Africa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Africa</span><br />Population : 11627386"
                    }
                },
                "AL": {
                    "value": 4404946,
                    "href": "https://en.wikipedia.org/w/index.php?search=Albania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Albania</span><br />Population : 4404946"
                    }
                },
                "DZ": {
                    "value": 17385595,
                    "href": "https://en.wikipedia.org/w/index.php?search=Algeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Algeria</span><br />Population : 17385595"
                    }
                },
                "DE": {
                    "value": 4971627,
                    "href": "https://en.wikipedia.org/w/index.php?search=Germany",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Germany</span><br />Population : 4971627"
                    }
                },
                "AD": {
                    "value": 13638189,
                    "href": "https://en.wikipedia.org/w/index.php?search=Andorra",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Andorra</span><br />Population : 13638189"
                    }
                },
                "AO": {
                    "value": 2701248,
                    "href": "https://en.wikipedia.org/w/index.php?search=Angola",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Angola</span><br />Population : 2701248"
                    }
                },
                "AG": {
                    "value": 15126184,
                    "href": "https://en.wikipedia.org/w/index.php?search=Antigua And Barbuda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Antigua And Barbuda</span><br />Population : 15126184"
                    }
                },
                "SA": {
                    "value": 46964511,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saudi Arabia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saudi Arabia</span><br />Population : 46964511"
                    }
                },
                "AR": {
                    "value": 12256219,
                    "href": "https://en.wikipedia.org/w/index.php?search=Argentina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Argentina</span><br />Population : 12256219"
                    }
                },
                "AM": {
                    "value": 50485245,
                    "href": "https://en.wikipedia.org/w/index.php?search=Armenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Armenia</span><br />Population : 50485245"
                    }
                },
                "AU": {
                    "value": 16025561,
                    "href": "https://en.wikipedia.org/w/index.php?search=Australia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Australia</span><br />Population : 16025561"
                    }
                },
                "AT": {
                    "value": 13965402,
                    "href": "https://en.wikipedia.org/w/index.php?search=Austria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Austria</span><br />Population : 13965402"
                    }
                },
                "AZ": {
                    "value": 43047101,
                    "href": "https://en.wikipedia.org/w/index.php?search=Azerbaijan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Azerbaijan</span><br />Population : 43047101"
                    }
                },
                "BS": {
                    "value": 11110061,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahamas",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahamas</span><br />Population : 11110061"
                    }
                },
                "BH": {
                    "value": 40674353,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahrain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahrain</span><br />Population : 40674353"
                    }
                },
                "BD": {
                    "value": 53852427,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bangladesh",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bangladesh</span><br />Population : 53852427"
                    }
                },
                "BB": {
                    "value": 51726459,
                    "href": "https://en.wikipedia.org/w/index.php?search=Barbados",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Barbados</span><br />Population : 51726459"
                    }
                },
                "BE": {
                    "value": 17478824,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belgium",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belgium</span><br />Population : 17478824"
                    }
                },
                "BZ": {
                    "value": 19813183,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belize",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belize</span><br />Population : 19813183"
                    }
                },
                "BJ": {
                    "value": 44953708,
                    "href": "https://en.wikipedia.org/w/index.php?search=Benin",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Benin</span><br />Population : 44953708"
                    }
                },
                "BT": {
                    "value": 13959918,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bhutan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bhutan</span><br />Population : 13959918"
                    }
                },
                "BY": {
                    "value": 52744657,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belarus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belarus</span><br />Population : 52744657"
                    }
                },
                "MM": {
                    "value": 33932678,
                    "href": "https://en.wikipedia.org/w/index.php?search=Myanmar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Myanmar</span><br />Population : 33932678"
                    }
                },
                "BO": {
                    "value": 15347372,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bolivia, Plurinational State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bolivia, Plurinational State Of</span><br />Population : 15347372"
                    }
                },
                "BA": {
                    "value": 55163105,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bosnia And Herzegovina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bosnia And Herzegovina</span><br />Population : 55163105"
                    }
                },
                "BW": {
                    "value": 10210684,
                    "href": "https://en.wikipedia.org/w/index.php?search=Botswana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Botswana</span><br />Population : 10210684"
                    }
                },
                "BR": {
                    "value": 13773462,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brazil",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brazil</span><br />Population : 13773462"
                    }
                },
                "BN": {
                    "value": 23061545,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brunei Darussalam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brunei Darussalam</span><br />Population : 23061545"
                    }
                },
                "BG": {
                    "value": 31201642,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bulgaria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bulgaria</span><br />Population : 31201642"
                    }
                },
                "BF": {
                    "value": 52730033,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burkina Faso",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burkina Faso</span><br />Population : 52730033"
                    }
                },
                "BI": {
                    "value": 39826160,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burundi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burundi</span><br />Population : 39826160"
                    }
                },
                "KH": {
                    "value": 36274350,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cambodia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cambodia</span><br />Population : 36274350"
                    }
                },
                "CM": {
                    "value": 7591156,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cameroon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cameroon</span><br />Population : 7591156"
                    }
                },
                "CA": {
                    "value": 13705826,
                    "href": "https://en.wikipedia.org/w/index.php?search=Canada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Canada</span><br />Population : 13705826"
                    }
                },
                "CV": {
                    "value": 42831397,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cape Verde",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cape Verde</span><br />Population : 42831397"
                    }
                },
                "CF": {
                    "value": 53113913,
                    "href": "https://en.wikipedia.org/w/index.php?search=Central African Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Central African Republic</span><br />Population : 53113913"
                    }
                },
                "CL": {
                    "value": 19897272,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chile",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chile</span><br />Population : 19897272"
                    }
                },
                "CN": {
                    "value": 55991190,
                    "href": "https://en.wikipedia.org/w/index.php?search=China",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">China</span><br />Population : 55991190"
                    }
                },
                "CY": {
                    "value": 43379798,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cyprus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cyprus</span><br />Population : 43379798"
                    }
                },
                "CO": {
                    "value": 41758359,
                    "href": "https://en.wikipedia.org/w/index.php?search=Colombia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Colombia</span><br />Population : 41758359"
                    }
                },
                "KM": {
                    "value": 13835614,
                    "href": "https://en.wikipedia.org/w/index.php?search=Comoros",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Comoros</span><br />Population : 13835614"
                    }
                },
                "CG": {
                    "value": 12989248,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo</span><br />Population : 12989248"
                    }
                },
                "CD": {
                    "value": 32111987,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo, The Democratic Republic Of The",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo, The Democratic Republic Of The</span><br />Population : 32111987"
                    }
                },
                "KP": {
                    "value": 335812,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Democratic People's Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Democratic People's Republic Of</span><br />Population : 335812"
                    }
                },
                "KR": {
                    "value": 24971808,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Republic Of</span><br />Population : 24971808"
                    }
                },
                "CR": {
                    "value": 47553128,
                    "href": "https://en.wikipedia.org/w/index.php?search=Costa Rica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Costa Rica</span><br />Population : 47553128"
                    }
                },
                "CI": {
                    "value": 29618591,
                    "href": "https://en.wikipedia.org/w/index.php?search=C\u00d4te D'ivoire",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">C\u00d4te D'ivoire</span><br />Population : 29618591"
                    }
                },
                "HR": {
                    "value": 16824399,
                    "href": "https://en.wikipedia.org/w/index.php?search=Croatia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Croatia</span><br />Population : 16824399"
                    }
                },
                "CU": {
                    "value": 58921479,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cuba",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cuba</span><br />Population : 58921479"
                    }
                },
                "DK": {
                    "value": 52985953,
                    "href": "https://en.wikipedia.org/w/index.php?search=Denmark",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Denmark</span><br />Population : 52985953"
                    }
                },
                "DJ": {
                    "value": 26540234,
                    "href": "https://en.wikipedia.org/w/index.php?search=Djibouti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Djibouti</span><br />Population : 26540234"
                    }
                },
                "DM": {
                    "value": 29452243,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominica</span><br />Population : 29452243"
                    }
                },
                "EG": {
                    "value": 31450250,
                    "href": "https://en.wikipedia.org/w/index.php?search=Egypt",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Egypt</span><br />Population : 31450250"
                    }
                },
                "AE": {
                    "value": 12440847,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Arab Emirates",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Arab Emirates</span><br />Population : 12440847"
                    }
                },
                "EC": {
                    "value": 43467542,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ecuador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ecuador</span><br />Population : 43467542"
                    }
                },
                "ER": {
                    "value": 6397470,
                    "href": "https://en.wikipedia.org/w/index.php?search=Eritrea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Eritrea</span><br />Population : 6397470"
                    }
                },
                "ES": {
                    "value": 8073748,
                    "href": "https://en.wikipedia.org/w/index.php?search=Spain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Spain</span><br />Population : 8073748"
                    }
                },
                "EE": {
                    "value": 58820939,
                    "href": "https://en.wikipedia.org/w/index.php?search=Estonia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Estonia</span><br />Population : 58820939"
                    }
                },
                "US": {
                    "value": 11141137,
                    "href": "https://en.wikipedia.org/w/index.php?search=United States",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United States</span><br />Population : 11141137"
                    }
                },
                "ET": {
                    "value": 5688205,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ethiopia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ethiopia</span><br />Population : 5688205"
                    }
                },
                "FJ": {
                    "value": 24357599,
                    "href": "https://en.wikipedia.org/w/index.php?search=Fiji",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Fiji</span><br />Population : 24357599"
                    }
                },
                "FI": {
                    "value": 55479349,
                    "href": "https://en.wikipedia.org/w/index.php?search=Finland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Finland</span><br />Population : 55479349"
                    }
                },
                "FR": {
                    "value": 10051648,
                    "href": "https://en.wikipedia.org/w/index.php?search=France",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">France</span><br />Population : 10051648"
                    }
                },
                "GA": {
                    "value": 55402573,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gabon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gabon</span><br />Population : 55402573"
                    }
                },
                "GM": {
                    "value": 26017425,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gambia</span><br />Population : 26017425"
                    }
                },
                "GE": {
                    "value": 15519204,
                    "href": "https://en.wikipedia.org/w/index.php?search=Georgia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Georgia</span><br />Population : 15519204"
                    }
                },
                "GH": {
                    "value": 30839697,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ghana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ghana</span><br />Population : 30839697"
                    }
                },
                "GR": {
                    "value": 33868698,
                    "href": "https://en.wikipedia.org/w/index.php?search=Greece",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Greece</span><br />Population : 33868698"
                    }
                },
                "GD": {
                    "value": 48618854,
                    "href": "https://en.wikipedia.org/w/index.php?search=Grenada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Grenada</span><br />Population : 48618854"
                    }
                },
                "GT": {
                    "value": 41893631,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guatemala",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guatemala</span><br />Population : 41893631"
                    }
                },
                "GN": {
                    "value": 34195911,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea</span><br />Population : 34195911"
                    }
                },
                "GQ": {
                    "value": 29064706,
                    "href": "https://en.wikipedia.org/w/index.php?search=Equatorial Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Equatorial Guinea</span><br />Population : 29064706"
                    }
                },
                "GW": {
                    "value": 37877509,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea-bissau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea-bissau</span><br />Population : 37877509"
                    }
                },
                "GY": {
                    "value": 27905753,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guyana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guyana</span><br />Population : 27905753"
                    }
                },
                "HT": {
                    "value": 10760913,
                    "href": "https://en.wikipedia.org/w/index.php?search=Haiti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Haiti</span><br />Population : 10760913"
                    }
                },
                "HN": {
                    "value": 39118723,
                    "href": "https://en.wikipedia.org/w/index.php?search=Honduras",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Honduras</span><br />Population : 39118723"
                    }
                },
                "HU": {
                    "value": 29359015,
                    "href": "https://en.wikipedia.org/w/index.php?search=Hungary",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Hungary</span><br />Population : 29359015"
                    }
                },
                "JM": {
                    "value": 16608694,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jamaica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jamaica</span><br />Population : 16608694"
                    }
                },
                "JP": {
                    "value": 41025330,
                    "href": "https://en.wikipedia.org/w/index.php?search=Japan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Japan</span><br />Population : 41025330"
                    }
                },
                "MH": {
                    "value": 32208871,
                    "href": "https://en.wikipedia.org/w/index.php?search=Marshall Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Marshall Islands</span><br />Population : 32208871"
                    }
                },
                "PW": {
                    "value": 28678998,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palau</span><br />Population : 28678998"
                    }
                },
                "SB": {
                    "value": 21105582,
                    "href": "https://en.wikipedia.org/w/index.php?search=Solomon Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Solomon Islands</span><br />Population : 21105582"
                    }
                },
                "IN": {
                    "value": 55729786,
                    "href": "https://en.wikipedia.org/w/index.php?search=India",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">India</span><br />Population : 55729786"
                    }
                },
                "ID": {
                    "value": 6463278,
                    "href": "https://en.wikipedia.org/w/index.php?search=Indonesia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Indonesia</span><br />Population : 6463278"
                    }
                },
                "JO": {
                    "value": 11503082,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jordan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jordan</span><br />Population : 11503082"
                    }
                },
                "IR": {
                    "value": 24549539,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iran, Islamic Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iran, Islamic Republic Of</span><br />Population : 24549539"
                    }
                },
                "IQ": {
                    "value": 15564905,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iraq",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iraq</span><br />Population : 15564905"
                    }
                },
                "IE": {
                    "value": 49860068,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ireland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ireland</span><br />Population : 49860068"
                    }
                },
                "IS": {
                    "value": 43346894,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iceland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iceland</span><br />Population : 43346894"
                    }
                },
                "IL": {
                    "value": 40043692,
                    "href": "https://en.wikipedia.org/w/index.php?search=Israel",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Israel</span><br />Population : 40043692"
                    }
                },
                "IT": {
                    "value": 30971313,
                    "href": "https://en.wikipedia.org/w/index.php?search=Italy",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Italy</span><br />Population : 30971313"
                    }
                },
                "KZ": {
                    "value": 40727365,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kazakhstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kazakhstan</span><br />Population : 40727365"
                    }
                },
                "KE": {
                    "value": 39976056,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kenya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kenya</span><br />Population : 39976056"
                    }
                },
                "KG": {
                    "value": 50741166,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kyrgyzstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kyrgyzstan</span><br />Population : 50741166"
                    }
                },
                "KI": {
                    "value": 2739636,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kiribati",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kiribati</span><br />Population : 2739636"
                    }
                },
                "KW": {
                    "value": 7143295,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kuwait",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kuwait</span><br />Population : 7143295"
                    }
                },
                "LA": {
                    "value": 7006195,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lao People's Democratic Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lao People's Democratic Republic</span><br />Population : 7006195"
                    }
                },
                "LS": {
                    "value": 9845083,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lesotho",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lesotho</span><br />Population : 9845083"
                    }
                },
                "LV": {
                    "value": 41310498,
                    "href": "https://en.wikipedia.org/w/index.php?search=Latvia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Latvia</span><br />Population : 41310498"
                    }
                },
                "LB": {
                    "value": 7135983,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lebanon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lebanon</span><br />Population : 7135983"
                    }
                },
                "LR": {
                    "value": 39902936,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liberia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liberia</span><br />Population : 39902936"
                    }
                },
                "LY": {
                    "value": 20308572,
                    "href": "https://en.wikipedia.org/w/index.php?search=Libya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Libya</span><br />Population : 20308572"
                    }
                },
                "LI": {
                    "value": 47474524,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liechtenstein",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liechtenstein</span><br />Population : 47474524"
                    }
                },
                "LT": {
                    "value": 8883554,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lithuania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lithuania</span><br />Population : 8883554"
                    }
                },
                "LU": {
                    "value": 24481903,
                    "href": "https://en.wikipedia.org/w/index.php?search=Luxembourg",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Luxembourg</span><br />Population : 24481903"
                    }
                },
                "MK": {
                    "value": 35334757,
                    "href": "https://en.wikipedia.org/w/index.php?search=Macedonia, The Former Yugoslav Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Macedonia, The Former Yugoslav Republic Of</span><br />Population : 35334757"
                    }
                },
                "MG": {
                    "value": 11872339,
                    "href": "https://en.wikipedia.org/w/index.php?search=Madagascar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Madagascar</span><br />Population : 11872339"
                    }
                },
                "MY": {
                    "value": 10514132,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malaysia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malaysia</span><br />Population : 10514132"
                    }
                },
                "MW": {
                    "value": 56208722,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malawi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malawi</span><br />Population : 56208722"
                    }
                },
                "MV": {
                    "value": 38076761,
                    "href": "https://en.wikipedia.org/w/index.php?search=Maldives",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Maldives</span><br />Population : 38076761"
                    }
                },
                "ML": {
                    "value": 14994568,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mali",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mali</span><br />Population : 14994568"
                    }
                },
                "MT": {
                    "value": 40105844,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malta",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malta</span><br />Population : 40105844"
                    }
                },
                "MA": {
                    "value": 20899017,
                    "href": "https://en.wikipedia.org/w/index.php?search=Morocco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Morocco</span><br />Population : 20899017"
                    }
                },
                "MU": {
                    "value": 41637711,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritius",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritius</span><br />Population : 41637711"
                    }
                },
                "MR": {
                    "value": 47481836,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritania</span><br />Population : 47481836"
                    }
                },
                "MX": {
                    "value": 35886813,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mexico",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mexico</span><br />Population : 35886813"
                    }
                },
                "FM": {
                    "value": 14018414,
                    "href": "https://en.wikipedia.org/w/index.php?search=Micronesia, Federated States Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Micronesia, Federated States Of</span><br />Population : 14018414"
                    }
                },
                "MD": {
                    "value": 29170731,
                    "href": "https://en.wikipedia.org/w/index.php?search=Moldova, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Moldova, Republic Of</span><br />Population : 29170731"
                    }
                },
                "MC": {
                    "value": 10124768,
                    "href": "https://en.wikipedia.org/w/index.php?search=Monaco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Monaco</span><br />Population : 10124768"
                    }
                },
                "MN": {
                    "value": 25935165,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mongolia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mongolia</span><br />Population : 25935165"
                    }
                },
                "ME": {
                    "value": 41182538,
                    "href": "https://en.wikipedia.org/w/index.php?search=Montenegro",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Montenegro</span><br />Population : 41182538"
                    }
                },
                "MZ": {
                    "value": 13778946,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mozambique",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mozambique</span><br />Population : 13778946"
                    }
                },
                "NA": {
                    "value": 13363989,
                    "href": "https://en.wikipedia.org/w/index.php?search=Namibia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Namibia</span><br />Population : 13363989"
                    }
                },
                "NP": {
                    "value": 8379025,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nepal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nepal</span><br />Population : 8379025"
                    }
                },
                "NI": {
                    "value": 18157013,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nicaragua",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nicaragua</span><br />Population : 18157013"
                    }
                },
                "NE": {
                    "value": 38515482,
                    "href": "https://en.wikipedia.org/w/index.php?search=Niger",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Niger</span><br />Population : 38515482"
                    }
                },
                "NG": {
                    "value": 17890124,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nigeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nigeria</span><br />Population : 17890124"
                    }
                },
                "NO": {
                    "value": 11296518,
                    "href": "https://en.wikipedia.org/w/index.php?search=Norway",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Norway</span><br />Population : 11296518"
                    }
                },
                "NZ": {
                    "value": 10457464,
                    "href": "https://en.wikipedia.org/w/index.php?search=New Zealand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New Zealand</span><br />Population : 10457464"
                    }
                },
                "OM": {
                    "value": 56583463,
                    "href": "https://en.wikipedia.org/w/index.php?search=Oman",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Oman</span><br />Population : 56583463"
                    }
                },
                "UG": {
                    "value": 14343799,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uganda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uganda</span><br />Population : 14343799"
                    }
                },
                "UZ": {
                    "value": 32815768,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uzbekistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uzbekistan</span><br />Population : 32815768"
                    }
                },
                "PK": {
                    "value": 53649518,
                    "href": "https://en.wikipedia.org/w/index.php?search=Pakistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Pakistan</span><br />Population : 53649518"
                    }
                },
                "PS": {
                    "value": 51136014,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palestine, State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palestine, State Of</span><br />Population : 51136014"
                    }
                },
                "PA": {
                    "value": 23315637,
                    "href": "https://en.wikipedia.org/w/index.php?search=Panama",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Panama</span><br />Population : 23315637"
                    }
                },
                "PG": {
                    "value": 41114902,
                    "href": "https://en.wikipedia.org/w/index.php?search=Papua New Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Papua New Guinea</span><br />Population : 41114902"
                    }
                },
                "PY": {
                    "value": 33548798,
                    "href": "https://en.wikipedia.org/w/index.php?search=Paraguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paraguay</span><br />Population : 33548798"
                    }
                },
                "NL": {
                    "value": 35276260,
                    "href": "https://en.wikipedia.org/w/index.php?search=Netherlands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Netherlands</span><br />Population : 35276260"
                    }
                },
                "PE": {
                    "value": 35446265,
                    "href": "https://en.wikipedia.org/w/index.php?search=Peru",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Peru</span><br />Population : 35446265"
                    }
                },
                "PH": {
                    "value": 34322043,
                    "href": "https://en.wikipedia.org/w/index.php?search=Philippines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Philippines</span><br />Population : 34322043"
                    }
                },
                "PL": {
                    "value": 45620929,
                    "href": "https://en.wikipedia.org/w/index.php?search=Poland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Poland</span><br />Population : 45620929"
                    }
                },
                "PT": {
                    "value": 52057328,
                    "href": "https://en.wikipedia.org/w/index.php?search=Portugal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Portugal</span><br />Population : 52057328"
                    }
                },
                "QA": {
                    "value": 11426306,
                    "href": "https://en.wikipedia.org/w/index.php?search=Qatar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Qatar</span><br />Population : 11426306"
                    }
                },
                "DO": {
                    "value": 40515317,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominican Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominican Republic</span><br />Population : 40515317"
                    }
                },
                "RO": {
                    "value": 35581537,
                    "href": "https://en.wikipedia.org/w/index.php?search=Romania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Romania</span><br />Population : 35581537"
                    }
                },
                "GB": {
                    "value": 54682340,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Kingdom",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Kingdom</span><br />Population : 54682340"
                    }
                },
                "RU": {
                    "value": 1796386,
                    "href": "https://en.wikipedia.org/w/index.php?search=Russian Federation",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Russian Federation</span><br />Population : 1796386"
                    }
                },
                "RW": {
                    "value": 57822849,
                    "href": "https://en.wikipedia.org/w/index.php?search=Rwanda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Rwanda</span><br />Population : 57822849"
                    }
                },
                "KN": {
                    "value": 38996246,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Kitts And Nevis",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Kitts And Nevis</span><br />Population : 38996246"
                    }
                },
                "SM": {
                    "value": 26304422,
                    "href": "https://en.wikipedia.org/w/index.php?search=San Marino",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">San Marino</span><br />Population : 26304422"
                    }
                },
                "VC": {
                    "value": 27147131,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Vincent And The Grenadines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Vincent And The Grenadines</span><br />Population : 27147131"
                    }
                },
                "LC": {
                    "value": 54422763,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Lucia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Lucia</span><br />Population : 54422763"
                    }
                },
                "SV": {
                    "value": 1580682,
                    "href": "https://en.wikipedia.org/w/index.php?search=El Salvador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">El Salvador</span><br />Population : 1580682"
                    }
                },
                "WS": {
                    "value": 39926700,
                    "href": "https://en.wikipedia.org/w/index.php?search=Samoa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Samoa</span><br />Population : 39926700"
                    }
                },
                "ST": {
                    "value": 18219165,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sao Tome And Principe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sao Tome And Principe</span><br />Population : 18219165"
                    }
                },
                "SN": {
                    "value": 28443185,
                    "href": "https://en.wikipedia.org/w/index.php?search=Senegal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Senegal</span><br />Population : 28443185"
                    }
                },
                "RS": {
                    "value": 18800470,
                    "href": "https://en.wikipedia.org/w/index.php?search=Serbia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Serbia</span><br />Population : 18800470"
                    }
                },
                "SC": {
                    "value": 18802298,
                    "href": "https://en.wikipedia.org/w/index.php?search=Seychelles",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Seychelles</span><br />Population : 18802298"
                    }
                },
                "SL": {
                    "value": 55503113,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sierra Leone",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sierra Leone</span><br />Population : 55503113"
                    }
                },
                "SG": {
                    "value": 7962240,
                    "href": "https://en.wikipedia.org/w/index.php?search=Singapore",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Singapore</span><br />Population : 7962240"
                    }
                },
                "SK": {
                    "value": 36371234,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovakia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovakia</span><br />Population : 36371234"
                    }
                },
                "SI": {
                    "value": 35934342,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovenia</span><br />Population : 35934342"
                    }
                },
                "SO": {
                    "value": 9839599,
                    "href": "https://en.wikipedia.org/w/index.php?search=Somalia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Somalia</span><br />Population : 9839599"
                    }
                },
                "SD": {
                    "value": 51008054,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sudan</span><br />Population : 51008054"
                    }
                },
                "SS": {
                    "value": 29958600,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Sudan</span><br />Population : 29958600"
                    }
                },
                "LK": {
                    "value": 14575955,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sri Lanka",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sri Lanka</span><br />Population : 14575955"
                    }
                },
                "SE": {
                    "value": 21619250,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sweden",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sweden</span><br />Population : 21619250"
                    }
                },
                "CH": {
                    "value": 5958749,
                    "href": "https://en.wikipedia.org/w/index.php?search=Switzerland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Switzerland</span><br />Population : 5958749"
                    }
                },
                "SR": {
                    "value": 5178192,
                    "href": "https://en.wikipedia.org/w/index.php?search=Suriname",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Suriname</span><br />Population : 5178192"
                    }
                },
                "SZ": {
                    "value": 27730264,
                    "href": "https://en.wikipedia.org/w/index.php?search=Swaziland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Swaziland</span><br />Population : 27730264"
                    }
                },
                "SY": {
                    "value": 21582690,
                    "href": "https://en.wikipedia.org/w/index.php?search=Syrian Arab Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Syrian Arab Republic</span><br />Population : 21582690"
                    }
                },
                "TJ": {
                    "value": 50642453,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tajikistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tajikistan</span><br />Population : 50642453"
                    }
                },
                "TZ": {
                    "value": 57495636,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tanzania, United Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tanzania, United Republic Of</span><br />Population : 57495636"
                    }
                },
                "TD": {
                    "value": 58550394,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chad",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chad</span><br />Population : 58550394"
                    }
                },
                "CZ": {
                    "value": 30320544,
                    "href": "https://en.wikipedia.org/w/index.php?search=Czech Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Czech Republic</span><br />Population : 30320544"
                    }
                },
                "TH": {
                    "value": 33437289,
                    "href": "https://en.wikipedia.org/w/index.php?search=Thailand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Thailand</span><br />Population : 33437289"
                    }
                },
                "TL": {
                    "value": 12826556,
                    "href": "https://en.wikipedia.org/w/index.php?search=Timor-leste",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Timor-leste</span><br />Population : 12826556"
                    }
                },
                "TG": {
                    "value": 339468,
                    "href": "https://en.wikipedia.org/w/index.php?search=Togo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Togo</span><br />Population : 339468"
                    }
                },
                "TO": {
                    "value": 38473438,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tonga",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tonga</span><br />Population : 38473438"
                    }
                },
                "TT": {
                    "value": 12371383,
                    "href": "https://en.wikipedia.org/w/index.php?search=Trinidad And Tobago",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Trinidad And Tobago</span><br />Population : 12371383"
                    }
                },
                "TN": {
                    "value": 26536578,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tunisia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tunisia</span><br />Population : 26536578"
                    }
                },
                "TM": {
                    "value": 15950613,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkmenistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkmenistan</span><br />Population : 15950613"
                    }
                },
                "TR": {
                    "value": 6731994,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkey",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkey</span><br />Population : 6731994"
                    }
                },
                "TV": {
                    "value": 15522860,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tuvalu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tuvalu</span><br />Population : 15522860"
                    }
                },
                "VU": {
                    "value": 44341327,
                    "href": "https://en.wikipedia.org/w/index.php?search=Vanuatu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Vanuatu</span><br />Population : 44341327"
                    }
                },
                "VE": {
                    "value": 58586954,
                    "href": "https://en.wikipedia.org/w/index.php?search=Venezuela, Bolivarian Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Venezuela, Bolivarian Republic Of</span><br />Population : 58586954"
                    }
                },
                "VN": {
                    "value": 45536841,
                    "href": "https://en.wikipedia.org/w/index.php?search=Viet Nam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Viet Nam</span><br />Population : 45536841"
                    }
                },
                "UA": {
                    "value": 41019846,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ukraine",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ukraine</span><br />Population : 41019846"
                    }
                },
                "UY": {
                    "value": 41906427,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uruguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uruguay</span><br />Population : 41906427"
                    }
                },
                "YE": {
                    "value": 51501615,
                    "href": "https://en.wikipedia.org/w/index.php?search=Yemen",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Yemen</span><br />Population : 51501615"
                    }
                },
                "ZM": {
                    "value": 55678602,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zambia</span><br />Population : 55678602"
                    }
                },
                "ZW": {
                    "value": 57040464,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zimbabwe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zimbabwe</span><br />Population : 57040464"
                    }
                }
            },
            "plots": {
                "paris": {
                    "value": 678406,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paris</span><br />Population: 678406"
                    }
                },
                "newyork": {
                    "value": 279913,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New-York</span><br />Population: 279913"
                    }
                },
                "sydney": {
                    "value": 747363,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sydney</span><br />Population: 747363"
                    }
                },
                "brasilia": {
                    "value": 140032,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brasilia</span><br />Population: 140032"
                    }
                },
                "tokyo": {
                    "value": 769153,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tokyo</span><br />Population: 769153"
                    }
                }
            }
        },
        "2013": {
            "areas": {
                "AF": {
                    "value": 30428397,
                    "href": "https://en.wikipedia.org/w/index.php?search=Afghanistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Afghanistan</span><br />Population : 30428397"
                    }
                },
                "ZA": {
                    "value": 42385364,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Africa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Africa</span><br />Population : 42385364"
                    }
                },
                "AL": {
                    "value": 23215097,
                    "href": "https://en.wikipedia.org/w/index.php?search=Albania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Albania</span><br />Population : 23215097"
                    }
                },
                "DZ": {
                    "value": 59170087,
                    "href": "https://en.wikipedia.org/w/index.php?search=Algeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Algeria</span><br />Population : 59170087"
                    }
                },
                "DE": {
                    "value": 12696768,
                    "href": "https://en.wikipedia.org/w/index.php?search=Germany",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Germany</span><br />Population : 12696768"
                    }
                },
                "AD": {
                    "value": 30181616,
                    "href": "https://en.wikipedia.org/w/index.php?search=Andorra",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Andorra</span><br />Population : 30181616"
                    }
                },
                "AO": {
                    "value": 59475364,
                    "href": "https://en.wikipedia.org/w/index.php?search=Angola",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Angola</span><br />Population : 59475364"
                    }
                },
                "AG": {
                    "value": 31932843,
                    "href": "https://en.wikipedia.org/w/index.php?search=Antigua And Barbuda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Antigua And Barbuda</span><br />Population : 31932843"
                    }
                },
                "SA": {
                    "value": 57555961,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saudi Arabia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saudi Arabia</span><br />Population : 57555961"
                    }
                },
                "AR": {
                    "value": 11777282,
                    "href": "https://en.wikipedia.org/w/index.php?search=Argentina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Argentina</span><br />Population : 11777282"
                    }
                },
                "AM": {
                    "value": 18871762,
                    "href": "https://en.wikipedia.org/w/index.php?search=Armenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Armenia</span><br />Population : 18871762"
                    }
                },
                "AU": {
                    "value": 12534076,
                    "href": "https://en.wikipedia.org/w/index.php?search=Australia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Australia</span><br />Population : 12534076"
                    }
                },
                "AT": {
                    "value": 58309098,
                    "href": "https://en.wikipedia.org/w/index.php?search=Austria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Austria</span><br />Population : 58309098"
                    }
                },
                "AZ": {
                    "value": 37712988,
                    "href": "https://en.wikipedia.org/w/index.php?search=Azerbaijan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Azerbaijan</span><br />Population : 37712988"
                    }
                },
                "BS": {
                    "value": 19332419,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahamas",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahamas</span><br />Population : 19332419"
                    }
                },
                "BH": {
                    "value": 36539411,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bahrain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bahrain</span><br />Population : 36539411"
                    }
                },
                "BD": {
                    "value": 58009305,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bangladesh",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bangladesh</span><br />Population : 58009305"
                    }
                },
                "BB": {
                    "value": 8779358,
                    "href": "https://en.wikipedia.org/w/index.php?search=Barbados",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Barbados</span><br />Population : 8779358"
                    }
                },
                "BE": {
                    "value": 29035458,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belgium",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belgium</span><br />Population : 29035458"
                    }
                },
                "BZ": {
                    "value": 49664472,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belize",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belize</span><br />Population : 49664472"
                    }
                },
                "BJ": {
                    "value": 9859707,
                    "href": "https://en.wikipedia.org/w/index.php?search=Benin",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Benin</span><br />Population : 9859707"
                    }
                },
                "BT": {
                    "value": 35417017,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bhutan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bhutan</span><br />Population : 35417017"
                    }
                },
                "BY": {
                    "value": 46109006,
                    "href": "https://en.wikipedia.org/w/index.php?search=Belarus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Belarus</span><br />Population : 46109006"
                    }
                },
                "MM": {
                    "value": 27574884,
                    "href": "https://en.wikipedia.org/w/index.php?search=Myanmar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Myanmar</span><br />Population : 27574884"
                    }
                },
                "BO": {
                    "value": 16813431,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bolivia, Plurinational State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bolivia, Plurinational State Of</span><br />Population : 16813431"
                    }
                },
                "BA": {
                    "value": 18416589,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bosnia And Herzegovina",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bosnia And Herzegovina</span><br />Population : 18416589"
                    }
                },
                "BW": {
                    "value": 38731186,
                    "href": "https://en.wikipedia.org/w/index.php?search=Botswana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Botswana</span><br />Population : 38731186"
                    }
                },
                "BR": {
                    "value": 35786273,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brazil",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brazil</span><br />Population : 35786273"
                    }
                },
                "BN": {
                    "value": 32073599,
                    "href": "https://en.wikipedia.org/w/index.php?search=Brunei Darussalam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brunei Darussalam</span><br />Population : 32073599"
                    }
                },
                "BG": {
                    "value": 8318701,
                    "href": "https://en.wikipedia.org/w/index.php?search=Bulgaria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Bulgaria</span><br />Population : 8318701"
                    }
                },
                "BF": {
                    "value": 5030123,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burkina Faso",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burkina Faso</span><br />Population : 5030123"
                    }
                },
                "BI": {
                    "value": 49964264,
                    "href": "https://en.wikipedia.org/w/index.php?search=Burundi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Burundi</span><br />Population : 49964264"
                    }
                },
                "KH": {
                    "value": 38793338,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cambodia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cambodia</span><br />Population : 38793338"
                    }
                },
                "CM": {
                    "value": 25713977,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cameroon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cameroon</span><br />Population : 25713977"
                    }
                },
                "CA": {
                    "value": 32983945,
                    "href": "https://en.wikipedia.org/w/index.php?search=Canada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Canada</span><br />Population : 32983945"
                    }
                },
                "CV": {
                    "value": 15824481,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cape Verde",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cape Verde</span><br />Population : 15824481"
                    }
                },
                "CF": {
                    "value": 50075772,
                    "href": "https://en.wikipedia.org/w/index.php?search=Central African Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Central African Republic</span><br />Population : 50075772"
                    }
                },
                "CL": {
                    "value": 1343042,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chile",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chile</span><br />Population : 1343042"
                    }
                },
                "CN": {
                    "value": 920773,
                    "href": "https://en.wikipedia.org/w/index.php?search=China",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">China</span><br />Population : 920773"
                    }
                },
                "CY": {
                    "value": 28832550,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cyprus",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cyprus</span><br />Population : 28832550"
                    }
                },
                "CO": {
                    "value": 49074027,
                    "href": "https://en.wikipedia.org/w/index.php?search=Colombia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Colombia</span><br />Population : 49074027"
                    }
                },
                "KM": {
                    "value": 15696521,
                    "href": "https://en.wikipedia.org/w/index.php?search=Comoros",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Comoros</span><br />Population : 15696521"
                    }
                },
                "CG": {
                    "value": 56718735,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo</span><br />Population : 56718735"
                    }
                },
                "CD": {
                    "value": 34704096,
                    "href": "https://en.wikipedia.org/w/index.php?search=Congo, The Democratic Republic Of The",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Congo, The Democratic Republic Of The</span><br />Population : 34704096"
                    }
                },
                "KP": {
                    "value": 48891227,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Democratic People's Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Democratic People's Republic Of</span><br />Population : 48891227"
                    }
                },
                "KR": {
                    "value": 59415040,
                    "href": "https://en.wikipedia.org/w/index.php?search=Korea, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Korea, Republic Of</span><br />Population : 59415040"
                    }
                },
                "CR": {
                    "value": 18805954,
                    "href": "https://en.wikipedia.org/w/index.php?search=Costa Rica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Costa Rica</span><br />Population : 18805954"
                    }
                },
                "CI": {
                    "value": 9104742,
                    "href": "https://en.wikipedia.org/w/index.php?search=C\u00d4te D'ivoire",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">C\u00d4te D'ivoire</span><br />Population : 9104742"
                    }
                },
                "HR": {
                    "value": 32680496,
                    "href": "https://en.wikipedia.org/w/index.php?search=Croatia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Croatia</span><br />Population : 32680496"
                    }
                },
                "CU": {
                    "value": 33289221,
                    "href": "https://en.wikipedia.org/w/index.php?search=Cuba",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Cuba</span><br />Population : 33289221"
                    }
                },
                "DK": {
                    "value": 35060556,
                    "href": "https://en.wikipedia.org/w/index.php?search=Denmark",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Denmark</span><br />Population : 35060556"
                    }
                },
                "DJ": {
                    "value": 17550116,
                    "href": "https://en.wikipedia.org/w/index.php?search=Djibouti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Djibouti</span><br />Population : 17550116"
                    }
                },
                "DM": {
                    "value": 13544961,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominica</span><br />Population : 13544961"
                    }
                },
                "EG": {
                    "value": 47759693,
                    "href": "https://en.wikipedia.org/w/index.php?search=Egypt",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Egypt</span><br />Population : 47759693"
                    }
                },
                "AE": {
                    "value": 43710666,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Arab Emirates",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Arab Emirates</span><br />Population : 43710666"
                    }
                },
                "EC": {
                    "value": 35705841,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ecuador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ecuador</span><br />Population : 35705841"
                    }
                },
                "ER": {
                    "value": 34537747,
                    "href": "https://en.wikipedia.org/w/index.php?search=Eritrea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Eritrea</span><br />Population : 34537747"
                    }
                },
                "ES": {
                    "value": 3617077,
                    "href": "https://en.wikipedia.org/w/index.php?search=Spain",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Spain</span><br />Population : 3617077"
                    }
                },
                "EE": {
                    "value": 12934408,
                    "href": "https://en.wikipedia.org/w/index.php?search=Estonia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Estonia</span><br />Population : 12934408"
                    }
                },
                "US": {
                    "value": 9287542,
                    "href": "https://en.wikipedia.org/w/index.php?search=United States",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United States</span><br />Population : 9287542"
                    }
                },
                "ET": {
                    "value": 48861978,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ethiopia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ethiopia</span><br />Population : 48861978"
                    }
                },
                "FJ": {
                    "value": 11302002,
                    "href": "https://en.wikipedia.org/w/index.php?search=Fiji",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Fiji</span><br />Population : 11302002"
                    }
                },
                "FI": {
                    "value": 759909,
                    "href": "https://en.wikipedia.org/w/index.php?search=Finland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Finland</span><br />Population : 759909"
                    }
                },
                "FR": {
                    "value": 33760846,
                    "href": "https://en.wikipedia.org/w/index.php?search=France",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">France</span><br />Population : 33760846"
                    }
                },
                "GA": {
                    "value": 39670780,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gabon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gabon</span><br />Population : 39670780"
                    }
                },
                "GM": {
                    "value": 31505090,
                    "href": "https://en.wikipedia.org/w/index.php?search=Gambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Gambia</span><br />Population : 31505090"
                    }
                },
                "GE": {
                    "value": 35265292,
                    "href": "https://en.wikipedia.org/w/index.php?search=Georgia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Georgia</span><br />Population : 35265292"
                    }
                },
                "GH": {
                    "value": 54841376,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ghana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ghana</span><br />Population : 54841376"
                    }
                },
                "GR": {
                    "value": 20067276,
                    "href": "https://en.wikipedia.org/w/index.php?search=Greece",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Greece</span><br />Population : 20067276"
                    }
                },
                "GD": {
                    "value": 54866968,
                    "href": "https://en.wikipedia.org/w/index.php?search=Grenada",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Grenada</span><br />Population : 54866968"
                    }
                },
                "GT": {
                    "value": 54678684,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guatemala",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guatemala</span><br />Population : 54678684"
                    }
                },
                "GN": {
                    "value": 48194757,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea</span><br />Population : 48194757"
                    }
                },
                "GQ": {
                    "value": 33104593,
                    "href": "https://en.wikipedia.org/w/index.php?search=Equatorial Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Equatorial Guinea</span><br />Population : 33104593"
                    }
                },
                "GW": {
                    "value": 42078259,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guinea-bissau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guinea-bissau</span><br />Population : 42078259"
                    }
                },
                "GY": {
                    "value": 27178207,
                    "href": "https://en.wikipedia.org/w/index.php?search=Guyana",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Guyana</span><br />Population : 27178207"
                    }
                },
                "HT": {
                    "value": 19436615,
                    "href": "https://en.wikipedia.org/w/index.php?search=Haiti",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Haiti</span><br />Population : 19436615"
                    }
                },
                "HN": {
                    "value": 31985855,
                    "href": "https://en.wikipedia.org/w/index.php?search=Honduras",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Honduras</span><br />Population : 31985855"
                    }
                },
                "HU": {
                    "value": 43679590,
                    "href": "https://en.wikipedia.org/w/index.php?search=Hungary",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Hungary</span><br />Population : 43679590"
                    }
                },
                "JM": {
                    "value": 10791989,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jamaica",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jamaica</span><br />Population : 10791989"
                    }
                },
                "JP": {
                    "value": 4132574,
                    "href": "https://en.wikipedia.org/w/index.php?search=Japan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Japan</span><br />Population : 4132574"
                    }
                },
                "MH": {
                    "value": 59764188,
                    "href": "https://en.wikipedia.org/w/index.php?search=Marshall Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Marshall Islands</span><br />Population : 59764188"
                    }
                },
                "PW": {
                    "value": 20361584,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palau",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palau</span><br />Population : 20361584"
                    }
                },
                "SB": {
                    "value": 33598154,
                    "href": "https://en.wikipedia.org/w/index.php?search=Solomon Islands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Solomon Islands</span><br />Population : 33598154"
                    }
                },
                "IN": {
                    "value": 7898260,
                    "href": "https://en.wikipedia.org/w/index.php?search=India",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">India</span><br />Population : 7898260"
                    }
                },
                "ID": {
                    "value": 9742715,
                    "href": "https://en.wikipedia.org/w/index.php?search=Indonesia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Indonesia</span><br />Population : 9742715"
                    }
                },
                "JO": {
                    "value": 22664868,
                    "href": "https://en.wikipedia.org/w/index.php?search=Jordan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Jordan</span><br />Population : 22664868"
                    }
                },
                "IR": {
                    "value": 33824826,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iran, Islamic Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iran, Islamic Republic Of</span><br />Population : 33824826"
                    }
                },
                "IQ": {
                    "value": 6399298,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iraq",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iraq</span><br />Population : 6399298"
                    }
                },
                "IE": {
                    "value": 44774564,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ireland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ireland</span><br />Population : 44774564"
                    }
                },
                "IS": {
                    "value": 11280066,
                    "href": "https://en.wikipedia.org/w/index.php?search=Iceland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Iceland</span><br />Population : 11280066"
                    }
                },
                "IL": {
                    "value": 39550131,
                    "href": "https://en.wikipedia.org/w/index.php?search=Israel",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Israel</span><br />Population : 39550131"
                    }
                },
                "IT": {
                    "value": 5251312,
                    "href": "https://en.wikipedia.org/w/index.php?search=Italy",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Italy</span><br />Population : 5251312"
                    }
                },
                "KZ": {
                    "value": 58162858,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kazakhstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kazakhstan</span><br />Population : 58162858"
                    }
                },
                "KE": {
                    "value": 36747803,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kenya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kenya</span><br />Population : 36747803"
                    }
                },
                "KG": {
                    "value": 48902195,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kyrgyzstan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kyrgyzstan</span><br />Population : 48902195"
                    }
                },
                "KI": {
                    "value": 40019928,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kiribati",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kiribati</span><br />Population : 40019928"
                    }
                },
                "KW": {
                    "value": 33060721,
                    "href": "https://en.wikipedia.org/w/index.php?search=Kuwait",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Kuwait</span><br />Population : 33060721"
                    }
                },
                "LA": {
                    "value": 59758704,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lao People's Democratic Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lao People's Democratic Republic</span><br />Population : 59758704"
                    }
                },
                "LS": {
                    "value": 30059140,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lesotho",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lesotho</span><br />Population : 30059140"
                    }
                },
                "LV": {
                    "value": 56420771,
                    "href": "https://en.wikipedia.org/w/index.php?search=Latvia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Latvia</span><br />Population : 56420771"
                    }
                },
                "LB": {
                    "value": 42471280,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lebanon",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lebanon</span><br />Population : 42471280"
                    }
                },
                "LR": {
                    "value": 11053393,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liberia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liberia</span><br />Population : 11053393"
                    }
                },
                "LY": {
                    "value": 41049094,
                    "href": "https://en.wikipedia.org/w/index.php?search=Libya",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Libya</span><br />Population : 41049094"
                    }
                },
                "LI": {
                    "value": 30119464,
                    "href": "https://en.wikipedia.org/w/index.php?search=Liechtenstein",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Liechtenstein</span><br />Population : 30119464"
                    }
                },
                "LT": {
                    "value": 9647659,
                    "href": "https://en.wikipedia.org/w/index.php?search=Lithuania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Lithuania</span><br />Population : 9647659"
                    }
                },
                "LU": {
                    "value": 31022498,
                    "href": "https://en.wikipedia.org/w/index.php?search=Luxembourg",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Luxembourg</span><br />Population : 31022498"
                    }
                },
                "MK": {
                    "value": 50050180,
                    "href": "https://en.wikipedia.org/w/index.php?search=Macedonia, The Former Yugoslav Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Macedonia, The Former Yugoslav Republic Of</span><br />Population : 50050180"
                    }
                },
                "MG": {
                    "value": 26631634,
                    "href": "https://en.wikipedia.org/w/index.php?search=Madagascar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Madagascar</span><br />Population : 26631634"
                    }
                },
                "MY": {
                    "value": 7592984,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malaysia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malaysia</span><br />Population : 7592984"
                    }
                },
                "MW": {
                    "value": 50406641,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malawi",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malawi</span><br />Population : 50406641"
                    }
                },
                "MV": {
                    "value": 55190525,
                    "href": "https://en.wikipedia.org/w/index.php?search=Maldives",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Maldives</span><br />Population : 55190525"
                    }
                },
                "ML": {
                    "value": 21622906,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mali",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mali</span><br />Population : 21622906"
                    }
                },
                "MT": {
                    "value": 19460379,
                    "href": "https://en.wikipedia.org/w/index.php?search=Malta",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Malta</span><br />Population : 19460379"
                    }
                },
                "MA": {
                    "value": 29896448,
                    "href": "https://en.wikipedia.org/w/index.php?search=Morocco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Morocco</span><br />Population : 29896448"
                    }
                },
                "MU": {
                    "value": 24648251,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritius",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritius</span><br />Population : 24648251"
                    }
                },
                "MR": {
                    "value": 20708905,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mauritania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mauritania</span><br />Population : 20708905"
                    }
                },
                "MX": {
                    "value": 58352970,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mexico",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mexico</span><br />Population : 58352970"
                    }
                },
                "FM": {
                    "value": 20032544,
                    "href": "https://en.wikipedia.org/w/index.php?search=Micronesia, Federated States Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Micronesia, Federated States Of</span><br />Population : 20032544"
                    }
                },
                "MD": {
                    "value": 16451486,
                    "href": "https://en.wikipedia.org/w/index.php?search=Moldova, Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Moldova, Republic Of</span><br />Population : 16451486"
                    }
                },
                "MC": {
                    "value": 59455256,
                    "href": "https://en.wikipedia.org/w/index.php?search=Monaco",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Monaco</span><br />Population : 59455256"
                    }
                },
                "MN": {
                    "value": 47523880,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mongolia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mongolia</span><br />Population : 47523880"
                    }
                },
                "ME": {
                    "value": 41405554,
                    "href": "https://en.wikipedia.org/w/index.php?search=Montenegro",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Montenegro</span><br />Population : 41405554"
                    }
                },
                "MZ": {
                    "value": 58678354,
                    "href": "https://en.wikipedia.org/w/index.php?search=Mozambique",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Mozambique</span><br />Population : 58678354"
                    }
                },
                "NA": {
                    "value": 23677582,
                    "href": "https://en.wikipedia.org/w/index.php?search=Namibia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Namibia</span><br />Population : 23677582"
                    }
                },
                "NP": {
                    "value": 59976236,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nepal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nepal</span><br />Population : 59976236"
                    }
                },
                "NI": {
                    "value": 24756103,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nicaragua",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nicaragua</span><br />Population : 24756103"
                    }
                },
                "NE": {
                    "value": 29656979,
                    "href": "https://en.wikipedia.org/w/index.php?search=Niger",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Niger</span><br />Population : 29656979"
                    }
                },
                "NG": {
                    "value": 8841510,
                    "href": "https://en.wikipedia.org/w/index.php?search=Nigeria",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Nigeria</span><br />Population : 8841510"
                    }
                },
                "NO": {
                    "value": 18963162,
                    "href": "https://en.wikipedia.org/w/index.php?search=Norway",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Norway</span><br />Population : 18963162"
                    }
                },
                "NZ": {
                    "value": 50574817,
                    "href": "https://en.wikipedia.org/w/index.php?search=New Zealand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New Zealand</span><br />Population : 50574817"
                    }
                },
                "OM": {
                    "value": 17365487,
                    "href": "https://en.wikipedia.org/w/index.php?search=Oman",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Oman</span><br />Population : 17365487"
                    }
                },
                "UG": {
                    "value": 20562665,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uganda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uganda</span><br />Population : 20562665"
                    }
                },
                "UZ": {
                    "value": 57387784,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uzbekistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uzbekistan</span><br />Population : 57387784"
                    }
                },
                "PK": {
                    "value": 49602320,
                    "href": "https://en.wikipedia.org/w/index.php?search=Pakistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Pakistan</span><br />Population : 49602320"
                    }
                },
                "PS": {
                    "value": 19932004,
                    "href": "https://en.wikipedia.org/w/index.php?search=Palestine, State Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Palestine, State Of</span><br />Population : 19932004"
                    }
                },
                "PA": {
                    "value": 34506671,
                    "href": "https://en.wikipedia.org/w/index.php?search=Panama",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Panama</span><br />Population : 34506671"
                    }
                },
                "PG": {
                    "value": 38603226,
                    "href": "https://en.wikipedia.org/w/index.php?search=Papua New Guinea",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Papua New Guinea</span><br />Population : 38603226"
                    }
                },
                "PY": {
                    "value": 42429236,
                    "href": "https://en.wikipedia.org/w/index.php?search=Paraguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paraguay</span><br />Population : 42429236"
                    }
                },
                "NL": {
                    "value": 5534652,
                    "href": "https://en.wikipedia.org/w/index.php?search=Netherlands",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Netherlands</span><br />Population : 5534652"
                    }
                },
                "PE": {
                    "value": 56289154,
                    "href": "https://en.wikipedia.org/w/index.php?search=Peru",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Peru</span><br />Population : 56289154"
                    }
                },
                "PH": {
                    "value": 35612613,
                    "href": "https://en.wikipedia.org/w/index.php?search=Philippines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Philippines</span><br />Population : 35612613"
                    }
                },
                "PL": {
                    "value": 19696191,
                    "href": "https://en.wikipedia.org/w/index.php?search=Poland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Poland</span><br />Population : 19696191"
                    }
                },
                "PT": {
                    "value": 32201559,
                    "href": "https://en.wikipedia.org/w/index.php?search=Portugal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Portugal</span><br />Population : 32201559"
                    }
                },
                "QA": {
                    "value": 1675738,
                    "href": "https://en.wikipedia.org/w/index.php?search=Qatar",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Qatar</span><br />Population : 1675738"
                    }
                },
                "DO": {
                    "value": 31569070,
                    "href": "https://en.wikipedia.org/w/index.php?search=Dominican Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Dominican Republic</span><br />Population : 31569070"
                    }
                },
                "RO": {
                    "value": 1993811,
                    "href": "https://en.wikipedia.org/w/index.php?search=Romania",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Romania</span><br />Population : 1993811"
                    }
                },
                "GB": {
                    "value": 8210849,
                    "href": "https://en.wikipedia.org/w/index.php?search=United Kingdom",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">United Kingdom</span><br />Population : 8210849"
                    }
                },
                "RU": {
                    "value": 55982050,
                    "href": "https://en.wikipedia.org/w/index.php?search=Russian Federation",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Russian Federation</span><br />Population : 55982050"
                    }
                },
                "RW": {
                    "value": 39575723,
                    "href": "https://en.wikipedia.org/w/index.php?search=Rwanda",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Rwanda</span><br />Population : 39575723"
                    }
                },
                "KN": {
                    "value": 39862720,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Kitts And Nevis",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Kitts And Nevis</span><br />Population : 39862720"
                    }
                },
                "SM": {
                    "value": 51490647,
                    "href": "https://en.wikipedia.org/w/index.php?search=San Marino",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">San Marino</span><br />Population : 51490647"
                    }
                },
                "VC": {
                    "value": 15173712,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Vincent And The Grenadines",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Vincent And The Grenadines</span><br />Population : 15173712"
                    }
                },
                "LC": {
                    "value": 42785697,
                    "href": "https://en.wikipedia.org/w/index.php?search=Saint Lucia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Saint Lucia</span><br />Population : 42785697"
                    }
                },
                "SV": {
                    "value": 34093543,
                    "href": "https://en.wikipedia.org/w/index.php?search=El Salvador",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">El Salvador</span><br />Population : 34093543"
                    }
                },
                "WS": {
                    "value": 10419076,
                    "href": "https://en.wikipedia.org/w/index.php?search=Samoa",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Samoa</span><br />Population : 10419076"
                    }
                },
                "ST": {
                    "value": 4666351,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sao Tome And Principe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sao Tome And Principe</span><br />Population : 4666351"
                    }
                },
                "SN": {
                    "value": 54302115,
                    "href": "https://en.wikipedia.org/w/index.php?search=Senegal",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Senegal</span><br />Population : 54302115"
                    }
                },
                "RS": {
                    "value": 35226904,
                    "href": "https://en.wikipedia.org/w/index.php?search=Serbia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Serbia</span><br />Population : 35226904"
                    }
                },
                "SC": {
                    "value": 2924264,
                    "href": "https://en.wikipedia.org/w/index.php?search=Seychelles",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Seychelles</span><br />Population : 2924264"
                    }
                },
                "SL": {
                    "value": 125592,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sierra Leone",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sierra Leone</span><br />Population : 125592"
                    }
                },
                "SG": {
                    "value": 57278104,
                    "href": "https://en.wikipedia.org/w/index.php?search=Singapore",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Singapore</span><br />Population : 57278104"
                    }
                },
                "SK": {
                    "value": 3953430,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovakia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovakia</span><br />Population : 3953430"
                    }
                },
                "SI": {
                    "value": 57084336,
                    "href": "https://en.wikipedia.org/w/index.php?search=Slovenia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Slovenia</span><br />Population : 57084336"
                    }
                },
                "SO": {
                    "value": 7167059,
                    "href": "https://en.wikipedia.org/w/index.php?search=Somalia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Somalia</span><br />Population : 7167059"
                    }
                },
                "SD": {
                    "value": 4916787,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sudan</span><br />Population : 4916787"
                    }
                },
                "SS": {
                    "value": 50713745,
                    "href": "https://en.wikipedia.org/w/index.php?search=South Sudan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">South Sudan</span><br />Population : 50713745"
                    }
                },
                "LK": {
                    "value": 51227414,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sri Lanka",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sri Lanka</span><br />Population : 51227414"
                    }
                },
                "SE": {
                    "value": 1456378,
                    "href": "https://en.wikipedia.org/w/index.php?search=Sweden",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sweden</span><br />Population : 1456378"
                    }
                },
                "CH": {
                    "value": 171292,
                    "href": "https://en.wikipedia.org/w/index.php?search=Switzerland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Switzerland</span><br />Population : 171292"
                    }
                },
                "SR": {
                    "value": 16398474,
                    "href": "https://en.wikipedia.org/w/index.php?search=Suriname",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Suriname</span><br />Population : 16398474"
                    }
                },
                "SZ": {
                    "value": 13431625,
                    "href": "https://en.wikipedia.org/w/index.php?search=Swaziland",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Swaziland</span><br />Population : 13431625"
                    }
                },
                "SY": {
                    "value": 48509174,
                    "href": "https://en.wikipedia.org/w/index.php?search=Syrian Arab Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Syrian Arab Republic</span><br />Population : 48509174"
                    }
                },
                "TJ": {
                    "value": 56144742,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tajikistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tajikistan</span><br />Population : 56144742"
                    }
                },
                "TZ": {
                    "value": 11448242,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tanzania, United Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tanzania, United Republic Of</span><br />Population : 11448242"
                    }
                },
                "TD": {
                    "value": 1725094,
                    "href": "https://en.wikipedia.org/w/index.php?search=Chad",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Chad</span><br />Population : 1725094"
                    }
                },
                "CZ": {
                    "value": 4191070,
                    "href": "https://en.wikipedia.org/w/index.php?search=Czech Republic",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Czech Republic</span><br />Population : 4191070"
                    }
                },
                "TH": {
                    "value": 36190262,
                    "href": "https://en.wikipedia.org/w/index.php?search=Thailand",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Thailand</span><br />Population : 36190262"
                    }
                },
                "TL": {
                    "value": 56453675,
                    "href": "https://en.wikipedia.org/w/index.php?search=Timor-leste",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Timor-leste</span><br />Population : 56453675"
                    }
                },
                "TG": {
                    "value": 44185947,
                    "href": "https://en.wikipedia.org/w/index.php?search=Togo",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Togo</span><br />Population : 44185947"
                    }
                },
                "TO": {
                    "value": 53817694,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tonga",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tonga</span><br />Population : 53817694"
                    }
                },
                "TT": {
                    "value": 13310977,
                    "href": "https://en.wikipedia.org/w/index.php?search=Trinidad And Tobago",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Trinidad And Tobago</span><br />Population : 13310977"
                    }
                },
                "TN": {
                    "value": 22255395,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tunisia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tunisia</span><br />Population : 22255395"
                    }
                },
                "TM": {
                    "value": 19142306,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkmenistan",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkmenistan</span><br />Population : 19142306"
                    }
                },
                "TR": {
                    "value": 53254670,
                    "href": "https://en.wikipedia.org/w/index.php?search=Turkey",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Turkey</span><br />Population : 53254670"
                    }
                },
                "TV": {
                    "value": 30560013,
                    "href": "https://en.wikipedia.org/w/index.php?search=Tuvalu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tuvalu</span><br />Population : 30560013"
                    }
                },
                "VU": {
                    "value": 49244031,
                    "href": "https://en.wikipedia.org/w/index.php?search=Vanuatu",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Vanuatu</span><br />Population : 49244031"
                    }
                },
                "VE": {
                    "value": 14572299,
                    "href": "https://en.wikipedia.org/w/index.php?search=Venezuela, Bolivarian Republic Of",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Venezuela, Bolivarian Republic Of</span><br />Population : 14572299"
                    }
                },
                "VN": {
                    "value": 8117620,
                    "href": "https://en.wikipedia.org/w/index.php?search=Viet Nam",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Viet Nam</span><br />Population : 8117620"
                    }
                },
                "UA": {
                    "value": 41140494,
                    "href": "https://en.wikipedia.org/w/index.php?search=Ukraine",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Ukraine</span><br />Population : 41140494"
                    }
                },
                "UY": {
                    "value": 8260205,
                    "href": "https://en.wikipedia.org/w/index.php?search=Uruguay",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Uruguay</span><br />Population : 8260205"
                    }
                },
                "YE": {
                    "value": 28604050,
                    "href": "https://en.wikipedia.org/w/index.php?search=Yemen",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Yemen</span><br />Population : 28604050"
                    }
                },
                "ZM": {
                    "value": 13872174,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zambia",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zambia</span><br />Population : 13872174"
                    }
                },
                "ZW": {
                    "value": 28205545,
                    "href": "https://en.wikipedia.org/w/index.php?search=Zimbabwe",
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Zimbabwe</span><br />Population : 28205545"
                    }
                }
            },
            "plots": {
                "paris": {
                    "value": 1025415,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Paris</span><br />Population: 1025415"
                    }
                },
                "newyork": {
                    "value": 785175,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">New-York</span><br />Population: 785175"
                    }
                },
                "sydney": {
                    "value": 477087,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Sydney</span><br />Population: 477087"
                    }
                },
                "brasilia": {
                    "value": 211212,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Brasilia</span><br />Population: 211212"
                    }
                },
                "tokyo": {
                    "value": 433935,
                    "tooltip": {
                        "content": "<span style=\"font-weight:bold;\">Tokyo</span><br />Population: 433935"
                    }
                }
            }
        }
    };

    // Default plots params
    var plots = {
        "paris": {
            "latitude": 48.86,
            "longitude": 2.3444,
            "text": {
                "position": "left",
                "content": "Paris"
            },
            "href": "https://en.wikipedia.org/w/index.php?search=Paris"
        },
        "newyork": {
            "latitude": 40.667,
            "longitude": -73.833,
            "text": {
                "content": "New york"
            },
            "href": "https://en.wikipedia.org/w/index.php?search=New York"
        },
        "sydney": {
            "latitude": -33.917,
            "longitude": 151.167,
            "text": {
                "content": "Sydney"
            },
            "href": "https://en.wikipedia.org/w/index.php?search=Sidney"
        },
        "brasilia": {
            "latitude": -15.781682,
            "longitude": -47.924195,
            "text": {
                "content": "Brasilia"
            },
            "href": "https://en.wikipedia.org/w/index.php?search=Brasilia"
        },
        "tokyo": {
            "latitude": 35.687418,
            "longitude": 139.692306,
            "text": {
                "content": "Tokyo"
            },
            "href": "https://en.wikipedia.org/w/index.php?search=Tokyo"
        }
    };

    // Knob initialisation (for selecting a year)
    $(".knob").knob({
        release: function (value) {
            $(".world").trigger('update', [{
                mapOptions: data[value],
                animDuration: 300
            }]);
        }
    });

    // Mapael initialisation
    $world = $(".world");
    $world.mapael({
        map: {
            name: "world_countries",
            defaultArea: {
                attrs: {
                    fill: "#3b3f5c",
                    stroke: "#232323",
                    "stroke-width": 0.3
                },
                attrsHover: {
                    fill: "#888ea8",
                    "font-weight": "bold"
                }
            },
            defaultPlot: {
                text: {
                    attrs: {
                        fill: "#3b3f5c"
                    },
                    attrsHover: {
                        fill: "#fff",
                        "font-weight": "bold"
                    }
                }
            }
            , zoom: {
                enabled: true
                , step: 0.25
                , maxLevel: 20
            }
        },
        legend: {
            area: {
                display: true,
                title: "Country population",
                marginBottom: 7,
                slices: [
                    {
                        max: 5000000,
                        attrs: {
                            fill: "#ee3d50"
                        },
                        label: "Less than 5M"
                    },
                    {
                        min: 5000000,
                        max: 10000000,
                        attrs: {
                            fill: "#f58b22"
                        },
                        label: "Between 5M and 10M"
                    },
                    {
                        min: 10000000,
                        max: 50000000,
                        attrs: {
                            fill: "#25d5e4"
                        },
                        label: "Between 10M and 50M"
                    },
                    {
                        min: 50000000,
                        attrs: {
                            fill: "#6156ce"
                        },
                        label: "More than 50M"
                    }
                ]
            },
            plot: {
                display: true,
                title: "City population",
                marginBottom: 15,
                slices: [
                    {
                        type: "circle",
                        max: 500000,
                        attrs: {
                            fill: "#f8538d",
                            "stroke-width": 1
                        },
                        attrsHover: {
                            transform: "s1.5",
                            "stroke-width": 1
                        },
                        label: "Less than 500 000",
                        size: 10
                    },
                    {
                        type: "circle",
                        min: 500000,
                        max: 1000000,
                        attrs: {
                            fill: "#ffbb44",
                            "stroke-width": 1
                        },
                        attrsHover: {
                            transform: "s1.5",
                            "stroke-width": 1
                        },
                        label: "Between 500 000 and 1M",
                        size: 20
                    },
                    {
                        type: "circle",
                        min: 1000000,
                        attrs: {
                            fill: "#e95f2b",
                            "stroke-width": 1
                        },
                        attrsHover: {
                            transform: "s1.5",
                            "stroke-width": 1
                        },
                        label: "More than 1M",
                        size: 30
                    }
                ]
            }
        },
        plots: $.extend(true, {}, data[2009]['plots'], plots),
        areas: data[2009]['areas']
    });
});