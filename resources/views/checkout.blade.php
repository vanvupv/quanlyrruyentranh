@include('share.header')

<body class="theme-color4 light ltr">
<!-- Start Navigation -->
@include('share.nav')

<!-- Start Breadcrumb -->
@include('share.breadcrumb')

<!-- Start Cart -->
<section class="cart-section section-b-space">
    <div class="container">
        @if($cartItems->count() > 0)
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table cart-table">
                        <thead>
                        <tr class="table-head">
                            <th scope="col">ảnh</th>
                            <th scope="col"> tên sản phẩm </th>
                            <th scope="col"> giá tiền </th>
                            <th scope="col"> số lượng </th>
                            <th scope="col"> Tổng tiền </th>
                            <th scope="col"> action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <a href="{{route('home.detail',$item->id)}}">
                                        <img src="{{asset($item->model->AnhBia)}}" class="blur-up lazyloaded"
                                             alt="{{ $item->name }}">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('home.detail', '1')}}">{{ $item->name }}</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="text" name="quantity" class="form-control input-number"
                                                           value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h2>${{$item->price}}</h2>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">
                                                <a href="javascript:void(0)">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>${{$item->price}}</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity"
                                                   class="form-control input-number" value="{{$item->qty}}">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="td-color">${{$item->subtotal()}}</h2>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 mt-md-5 mt-4">
                    <div class="row">
                        <div class="col-sm-7 col-5 order-1">
                            <div class="left-side-button text-end d-flex d-block justify-content-end">
                                <a href="javascript:void(0)"
                                   onclick="clearItemCart()"
                                   class="text-decoration-underline theme-color d-block text-capitalize"> Xóa tất cả </a>
                            </div>
                        </div>
                        <div class="col-sm-5 col-7">
                            <div class="left-side-button float-start">
                                <a href="{{route('home.shop')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                    <i class="fas fa-arrow-left"></i> Tiếp tục mua sắm </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-checkout-section">
                    <div class="row g-4">
                        <div class="col-lg-4 col-sm-6">
                            <div class="promo-section">
                                <form class="row g-3">
                                    <div class="col-7">
                                        <input type="text" class="form-control" id="number" placeholder="Mã Giảm Giá">
                                    </div>
                                    <div class="col-5">
                                        <button class="btn btn-solid-default rounded btn"> Áp Dụng Mã </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="cart-box">
                                <div class="cart-box-details">
                                    <div class="total-details">
                                        <div class="top-details">
                                            <h3>Cart Totals</h3>
                                            <h6>Sub Total <span>{{$totalItem}}</span></h6>
                                            <h6>Tax <span></span></h6>
                                            <h6>Total <span>{{$totalItem}}</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <form class="sc-shipping-address" id="sc_form-process" role="form" method="POST"
                              action="{{route('checkout.process')}}">
                           @csrf
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
                                    <div class="row" style="padding-bottom: 20px;">
                                        <div class="col-md-12 text-center">
                                            <div class="pull-right">
                                                <input type="submit" value="Check Out" class="btn btn-warning">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- -->
                        <form  action="{{route('checkout')}}" method="post">
                            <input type="hidden" name="order_id" value="">
                            <input type="hidden" name="money" value="{{Cart::instance('cart')->total()}}">
                            <button type="submit" name="redirect" class="btn btn-success"> Thanh toán VNPay </button>
                            @csrf
                        </form>
                        <!-- -->
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Giỏ hàng của bạn đang rỗng!</h2>
                    <h5 class="mt-3">Thêm sản phẩm vào bây giờ</h5>
                    <a href="{{route('home.shop')}}" class="btn btn-warning mt-5">Cửa Hàng</a>
                </div>
            </div>
        @endif
    </div>
</section>

</div>

<div class="tap-to-top">
    <a href="#home">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>

<div class="bg-overlay"></div>

<script>
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip()
    });
</script>

@include('share.footer')

