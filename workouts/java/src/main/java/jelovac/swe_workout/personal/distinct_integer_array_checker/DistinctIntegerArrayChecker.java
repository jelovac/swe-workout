package jelovac.swe_workout.personal.distinct_integer_array_checker;

import java.util.ArrayList;
import java.util.Arrays;

public class DistinctIntegerArrayChecker {

  public boolean checkIsDistinctUsingSortingApproach(int[] values) {
    Arrays.sort(values);

    for (int i = 0; i < (values.length - 1); i++) {
      int value = values[i];
      int nextValue = values[i + 1];
      if (value == nextValue) {
        return false;
      }
    }

    return true;
  }

  public boolean checkIsDistinctUsingSecondaryListApproach(int[] values) {

    ArrayList<Integer> list = new ArrayList<>();

    for (int value : values) {
      if (list.contains(value)) {
        return false;
      }

      list.add(value);
    }

    return true;
  }
}
