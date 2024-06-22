@extends('admin.main')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-primary" role="alert">
            {{session('message')}}
        </div>
    @endif

    <!-- -->
    <form action={{route('order.product_info')}} id="addProduct" name="addProduct">
        <div class="addProdcut">
            <select name="addProduct" id="addProductSelect">
                <option value=""></option>
                @foreach($sanphams as $ind => $item)
                    <option value={{$item->id}}> {{$item->tensanpham}} </option>
                @endforeach
            </select>
        </div>
    </form>

    <form id="productDetail" name="productDetail" method="POST" action={{route('order.store')}} >
        @csrf
        <!-- -->
        <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless table-responsive">
                        <tbody>
                        <tr width="100%">
                            <td class="form-group">
                                <label class="control-label"><i class="fa fa-user"></i>
                                    First name:</label>
                                <input class="form-control" name="first_name" type="text" placeholder="First name" value="">
                            </td>
                            <td class="form-group">
                                <label class="control-label"><i class="fa fa-user"></i>
                                    Last name:</label>
                                <input class="form-control" name="last_name" type="text" placeholder="Last name" value="">
                            </td>
                        </tr>
                        <tr>
                            <td class="form-group">
                                <label class="control-label"><i class="fa fa-envelope"></i>
                                    Email:</label>
                                <input class="form-control" name="email" type="text" placeholder="Email" value="">
                            </td>
                            <td class="form-group">
                                <label class="control-label"><i class="fa fa-phone" aria-hidden="true"></i> Phone:</label>
                                <input class="form-control" name="phone" type="text" placeholder="Phone" value="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="form-group">
                                <label for="country" class="control-label"><i class="fas fa-globe"></i>
                                    Country:</label>
                                <select class="form-control country " style="width: 100%;" name="country">
                                    <option value="">__Country__</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="DS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="BN">Brunei Darussalam</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="HR">Croatia (Hrvatska)</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="TP">East Timor</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="FX">France, Metropolitan</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GK">Guernsey</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard and Mc Donald Islands</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran (Islamic Republic of)</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="CI">Ivory Coast</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KP">Korea,Democratic People\s Republic of</option>
                                    <option value="KR">Korea, Republic of</option>
                                    <option value="XK">Kosovo</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Lao People\s Democratic Republic</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libyan Arab Jamahiriya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macau</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="TY">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia, Federated States of</option>
                                    <option value="MD">Moldova, Republic of</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestine</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Reunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia South Sandwich Islands</option>
                                    <option value="SS">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SH">St. Helena</option>
                                    <option value="PM">St. Pierre and Miquelon</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syrian Arab Republic</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania, United Republic of</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US">United States</option>
                                    <option value="UM">United States minor outlying islands</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VA">Vatican City State</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="VG">Virgin Islands (British)</option>
                                    <option value="vi">Virgin Islands (U.S.)</option>
                                    <option value="WF">Wallis and Futuna Islands</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZR">Zaire</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <td colspan="2" class="form-group ">
                                <label for="address1" class="control-label"><i class="fa fa-list-ul"></i>
                                    Address:</label>
                                <input class="form-control" name="address" type="text" placeholder="Address " value="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label class="control-label"><i class="fa fa-calendar-o"></i>
                                    Note:</label>
                                <textarea class="form-control" rows="5" name="comment" placeholder="Note...."></textarea>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table box table-bordered" id="sc_showTotal">
                                <tbody>
                                <tr class="sc_showTotal">
                                    <th>SubTotal</th>
                                    <td style="text-align: right" id="subtotal">
                                        $50
                                    </td>
                                </tr>
                                <tr class="sc_showTotal">
                                    <th>Tax</th>
                                    <td style="text-align: right" id="tax">
                                        $5
                                    </td>
                                </tr>
                                <tr class="sc_showTotal" style="background:#f5f3f3;font-weight: bold;">
                                    <th>Total</th>
                                    <td style="text-align: right" id="total">
                                        $55
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="control-label" for="inputGroupSuccess3"><i class="fa fa-exchange"
                                                                                                         aria-hidden="true"></i> Coupon
                                                    <span style="display:inline; cursor: pointer; display: none"
                                                          class="text-danger" id="removeCoupon">(Remove coupon <i
                                                            class="fa fa fa-times"></i>)</span>
                                                </label>
                                                <div id="coupon-group" class="input-group ">
                                                    <input type="text" placeholder="Your coupon" class="form-control"
                                                           id="coupon-value" aria-describedby="inputGroupSuccess3Status">
                                                    <div class="input-group-prepend">
                                                <span class="input-group-text " id="coupon-button"
                                                      style="cursor: pointer;"
                                                      data-loading-text="<i class='fa fa-spinner fa-spin'></i> checking">Apply</span>
                                                    </div>
                                                </div>
                                                <span class="status-coupon" style="display: none;" aria-hidden="true"></span>
                                                <div class="coupon-msg  " style="text-align: left;padding-left: 10px; "></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <h3 class="control-label"><i class="fa fa-truck" aria-hidden="true"></i>
                                            Shipping method:<br></h3>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <label class="radio-inline">
                                                <input type="radio" name="shippingMethod" value="ShippingStandard"
                                                       style="position: relative;" class="radio-custom"><span
                                                    class="radio-custom-dummy"></span>
                                                <span for="shippingMethod">Shipping Standard</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <h3 class="control-label"><i class="fa fa-credit-card-alt"></i>
                                            Payment method:<br></h3>
                                    </div>
                                    <div class="form-group cart-payment-method">
                                        <div>
                                            <label class="radio-inline">
                                                <input type="radio" name="paymentMethod" value="Cash"
                                                       style="position: relative;" class="radio-custom"><span
                                                    class="radio-custom-dummy"></span>
                                                <span class="radio-inline" for="paymentMethod">
                                            <img title="Cash on delivery" alt="Cash on delivery"
                                                 src="https://demo.s-cart.org/Plugins/Payment/Cash/images/logo.png">
                                        </span>
                                            </label>
                                        </div>
                                        <div>
                                            <label class="radio-inline">
                                                <input type="radio" name="paymentMethod" value="BankTransfer"
                                                       style="position: relative;" class="radio-custom"><span
                                                    class="radio-custom-dummy"></span>
                                                <span class="radio-inline" for="paymentMethod">
                                            <img title="Bank transfer" alt="Bank transfer"
                                                 src="https://demo.s-cart.org/Plugins/Payment/BankTransfer/images/logo.png">
                                        </span>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                Bank name: ABC XYZ<br>Bank number: 12345678
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- -->
        <input type="hidden" name="listProduct" value="">
        <table class="table">
            <thead>
                <th>STT</th>
                <th>Ma san pham</th>
                <th>Ten san pham</th>
                <th>So luong</th>
                <th>Gia ban</th>
                <th>Tong tien</th>
                <th>Action</th>
            </thead>
            <tbody class="listProduct_content">
                <!-- -->
            </tbody>
        </table>
        <input type="submit" class="btn btn-warning" value="Xác nhận">
    </form>
    <!-- -->


@endsection
