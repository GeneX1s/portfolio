// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}


/* -------------------------------------------------------------------------- */
/*                                Market Share                                */
/* -------------------------------------------------------------------------- */

var marketShareInit = function marketShareInit() {
  var ECHART_MARKET_SHARE = ".echart-market-share";
  var $echartMarketShare = document.querySelector(ECHART_MARKET_SHARE);
  if ($echartMarketShare) {
      var userOptions = utils.getData($echartMarketShare, "options");
      var chart = window.echarts.init($echartMarketShare);
      var getDefaultOptions = function getDefaultOptions() {
          return {
              color: [
                  utils.getColors().primary,
                  utils.getColors().info,
                  utils.getGrays()[300],
              ],
              tooltip: {
                  trigger: "item",
                  padding: [7, 10],
                  backgroundColor: utils.getGrays()["100"],
                  borderColor: utils.getGrays()["300"],
                  textStyle: {
                      color: utils.getGrays()["1100"],
                  },
                  borderWidth: 1,
                  transitionDuration: 0,
                  formatter: function formatter(params) {
                      return "<strong>"
                          .concat(params.data.name, ":</strong> ")
                          .concat(params.percent, "%");
                  },
              },
              position: function position(pos, params, dom, rect, size) {
                  return getPosition(pos, params, dom, rect, size);
              },
              legend: {
                  show: false,
              },
              series: [
                  {
                      type: "pie",
                      radius: ["100%", "87%"],
                      avoidLabelOverlap: false,
                      hoverAnimation: false,
                      itemStyle: {
                          borderWidth: 2,
                          borderColor: utils.getColor("gray-100"),
                      },
                      label: {
                          normal: {
                              show: false,
                              position: "center",
                              textStyle: {
                                  fontSize: "20",
                                  fontWeight: "500",
                                  color: utils.getGrays()["100"],
                              },
                          },
                          emphasis: {
                              show: false,
                          },
                      },
                      labelLine: {
                          normal: {
                              show: false,
                          },
                      },
                      data: userOptions, // Use the dynamic data here
                  },
              ],
          };
      };
      echartSetOption(chart, userOptions, getDefaultOptions);
  }
}
;
