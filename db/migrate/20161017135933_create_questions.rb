class CreateQuestions < ActiveRecord::Migration[5.0]
  def change
    create_table :questions do |t|
      t.text :option1
      t.text :option2
      t.string :image1
      t.string :image2
      t.integer :count1
      t.integer :count2

      t.timestamps
    end
  end
end
